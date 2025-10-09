<?php

namespace App\Http\Controllers;

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
    // Menampilkan halaman pembayaran
    public function paymentIndex()
    {
        $packages = Package::all();
        return view('payment.paket-berlangganan', compact('packages'));
    }

    // Mendapatkan token Snap untuk pembayaran
    public function getSnapToken(Request $request)
    {
        $user = $request->user();
        $package_name = $request->input('packageName');
        $package_id = $request->input('packageId');
        $amount = $request->input('amount');

        // Membuat orderId unik
        $orderId = 'ORD-' . time() . '-' . $user->id;

        // Simpan data transaksi ke database
        $payment = Payment::create([
            'user_id' => $user->id,
            'order_id' => $orderId,
            'package_id' => $package_id,
            'package_name' => $package_name,
            'amount' => $amount,
            'status' => 'pending',
        ]);

        // 🔧 Inisialisasi konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction', false);
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Konfigurasi parameter Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $amount,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
                'phone' => '08111222333',
            ],
            'item_details' => [
                [
                    'id' => $package_id,
                    'price' => $amount,
                    'quantity' => 1,
                    'name' => $package_name,
                ],
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            return response()->json(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            Log::error('Payment Error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Menangani notifikasi dari Midtrans
    public function handleNotification(Request $request)
    {
        $transaction = $request->transaction_status;
        $orderId = $request->order_id;

        $payment = Payment::where('order_id', $orderId)->first();

        if (!$payment) {
            return response()->json(['status' => 'error', 'message' => 'Payment not found'], 404);
        }

        if ($transaction == 'settlement' || $transaction == 'capture') {
            $user = User::find($payment->user_id);

            if ($user) {
                $user->role = 'customer';
                $user->save();

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
