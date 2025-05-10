<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function paymentIndex()
    {
        return view('paket-berlangganan');
    }

    public function getSnapToken(Request $request)
    {
        // Masih dalam tahap percobaan
        //Belum mengintegrasikan dengan database serta model User yang login        
        $params = [
            'transaction_details' => [
                'order_id' => uniqid(),
                'gross_amount' => 10000,
            ],
            'customer_details' => [
                'first_name' => 'Yoga',
                'last_name' => 'Meleniawan',
                'email' => 'yogameleniawan@example.com',
                'phone' => '08111222333',
            ],
        ];

        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            return response()->json(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
