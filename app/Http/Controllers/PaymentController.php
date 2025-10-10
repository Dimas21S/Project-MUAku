<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use Midtrans\Config;
use \Midtrans\Snap;

class PaymentController extends Controller
{
    // Mendapatkan token Snap untuk pembayaran
    public function getSnapToken(Request $request)
    {
        try {
            $user = $request->user();
            
            $packageId = $request->input('package_id');
            $MUA_Id = $request->input('mua_id');
            $price = $request->input('price');
            $biayaAdmin = $request->input('biaya_admin');
            $total = $request->input('total');

            // Validasi input
            if (!$packageId || !$MUA_Id || !$total) {
                return response()->json(['error' => 'Data tidak lengkap'], 400);
            }

            // Membuat orderId unik
            $orderId = 'ORD-' . time() . '-' . $user->id;

            // Simpan data transaksi ke database
            $booking = Booking::create([
                'id_user' => $user->id,
                'id_mua' => $MUA_Id,
                'kode_pembayaran' => $orderId,
                'package_id' => $packageId,
                'amount' => $total,
                'status' => 'pending',
            ]);

            // 🔧 DEBUG: Cek konfigurasi Midtrans
            Log::info('Midtrans Config Check', [
                'server_key_exists' => !empty(config('services.midtrans.serverKey')),
                'server_key_prefix' => substr(config('services.midtrans.serverKey'), 0, 10) . '...',
                'is_production' => config('services.midtrans.isProduction'),
                'order_id' => $orderId,
                'total_amount' => $total
            ]);

            // 🔧 Inisialisasi konfigurasi Midtrans - PERBAIKAN KEY NAMES
            Config::$serverKey = config('services.midtrans.serverKey'); // ← perbaikan: server_key bukan serverKey
            Config::$isProduction = config('services.midtrans.isProduction', false); // ← perbaikan: is_production bukan isProduction
            Config::$isSanitized = true;
            Config::$is3ds = true;

            // Konfigurasi parameter Midtrans
            $params = [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => (int) $total, // ← pastikan integer
                ],
                'customer_details' => [
                    'first_name' => $user->name ?? 'Customer',
                    'email' => $user->email ?? 'customer@example.com',
                    'phone' => $user->phone ?? '08111222333',
                ],
                'item_details' => [
                    [
                        'id' => $packageId,
                        'price' => (int) $total,
                        'quantity' => 1,
                        'name' => 'Paket Konsultasi', // ← tambahkan name
                    ],
                ],
            ];

            $snapToken = Snap::getSnapToken($params);
            
            // Update booking dengan snap token
            $booking->update(['snap_token' => $snapToken]);
            
            return response()->json([
                'snap_token' => $snapToken,
                'order_id' => $orderId
            ]);
            
        } catch (\Exception $e) {
            Log::error('Payment Error: ' . $e->getMessage());
            Log::error('Payment Trace: ' . $e->getTraceAsString());
            return response()->json([
                'error' => 'Terjadi kesalahan koneksi ke server pembayaran',
                'debug' => env('APP_DEBUG') ? $e->getMessage() : null
            ], 500);
        }
    }

    // Menangani notifikasi dari Midtrans
    public function handleNotification(Request $request)
    {
        $transaction = $request->transaction_status;
        $orderId = $request->order_id;

        $payment = Booking::where('kode_pembayaran', $orderId)->first();

        if (!$payment) {
            return response()->json(['status' => 'error', 'message' => 'Payment not found'], 404);
        }

        if ($transaction == 'settlement' || $transaction == 'capture') {
            $user = User::find($payment->id_user);

            if ($user) {
                $payment->status = 'success';
                $payment->save();

                Log::info("User {$user->id} role updated to customer after successful payment");
            }
        } elseif (in_array($transaction, ['expire', 'cancel', 'deny'])) {
            $payment->status = 'failed';
            $payment->save();
        }

        return response()->json(['status' => 'success']);
    }

    // Menampilkan halaman sukses pembayaran
    public function paymentSuccess()
    {
        $success = Payment::where('user_id', Auth::id())
            ->where('status', 'success')
            ->latest()
            ->first();

        return view('payment.pembayaran-berhasil', compact('success'));
    }
}
