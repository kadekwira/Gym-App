<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;


class PaymentController extends Controller
{
    public function pay(Request $request)
    {
        // Setup konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Ambil data pembayaran dari request
        $transactionDetails = $request->transaction_details;
        $itemDetails = $request->item_details;
        $customerDetails = $request->customer_details;

        // Buat request ke Midtrans Snap API
        try {
            $snapToken = Snap::getSnapToken([
                'transaction_details' => $transactionDetails,
                'item_details' => [$itemDetails],
                'customer_details' => $customerDetails
                // Tambahkan konfigurasi tambahan sesuai kebutuhan
            ]);

            return response()->json(['redirect_url' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
