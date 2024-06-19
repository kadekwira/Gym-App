<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use App\Models\User;
use Midtrans\Config;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MembershipType;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function index()
    {
        $datas = MembershipType::all();
        return view('user.regis', compact('datas'));
    }

    public function saveStep1(Request $request)
    {
        // Validasi data pendaftaran
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'membership_type_id' => 'required|exists:membership_types,id',
            'membership_start' => 'nullable|date',
            'membership_end' => 'nullable|date',
        ]);

        $validatedData['status'] = "active";
        $validatedData['password'] = Hash::make($validatedData['password']);
        // Simpan data user ke database
        $user = User::create($validatedData);

        $transaction = Transaction::create([
            'id'=>(string) Str::uuid(),
            'user_id' => $user->id,
            'total' => $this->calculateMembershipPrice($request->membership_type_id),
            'date_time' => now(), // Tanggal dan waktu saat ini
            'desctiption' => 'Membership Subscription', // Deskripsi transaksi
            'payment_method' => 'pending', // Status pembayaran "pending"
            'note' => 'Waiting for payment confirmation', // Catatan
            'status' => 'pending', // Status transaksi "pending"
        ]);
        // Set up konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Persiapkan data pembayaran
        $transactionDetails = [
            'order_id' => $transaction->id,
            'gross_amount' => $this->calculateMembershipPrice($request->membership_type_id),
        ];

        $itemDetails = [
            [
                'id' => 'membership',
                'price' => $transactionDetails['gross_amount'],
                'quantity' => 1,
                'name' => 'Membership Subscription', // Sesuaikan jika perlu
            ]
        ];

        $customerDetails = [
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
        ];

        // Panggil Midtrans Snap API untuk mendapatkan Snap Token
        try {
            $snapToken = Snap::getSnapToken([
                'transaction_details' => $transactionDetails,
                'item_details' => $itemDetails,
                'customer_details' => $customerDetails,
                // Konfigurasi tambahan jika diperlukan
            ]);

            // Kirim Snap Token sebagai respons AJAX
            return response()->json(['snapToken' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Fungsi untuk menghitung harga keanggotaan berdasarkan tipe keanggotaan
    private function calculateMembershipPrice($membershipTypeId)
    {
        $membershipType = MembershipType::findOrFail($membershipTypeId);
        return $membershipType->price_member * $membershipType->duration_member;
    }


    public function midtransCallback(Request $request)
    {
        // Ambil data dari callback Midtrans
        $transactionStatus = $request->input('transaction_status');
        $orderId = $request->input('order_id');
        $paymentType = $request->input('payment_type');

        // Cari transaksi berdasarkan order_id
        $transaction = Transaction::where('id', $orderId)->first();

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        // Periksa status transaksi dari callback
        if ($transactionStatus === 'capture') {
            // Transaksi berhasil, update status menjadi 'success'
            $transaction->status = 'success';
            $transaction->payment_method = $paymentType; // Simpan metode pembayaran yang digunakan
        } elseif ($transactionStatus === 'settlement') {
            // Transaksi berhasil di-settle
            $transaction->status = 'success';
            $transaction->payment_method = $paymentType;
        } elseif ($transactionStatus === 'pending') {
            // Transaksi masih menunggu pembayaran
            $transaction->status = 'pending';
        } elseif ($transactionStatus === 'deny') {
            // Pembayaran ditolak
            $transaction->status = 'failed';
        } elseif ($transactionStatus === 'expire') {
            // Transaksi kadaluarsa
            $transaction->status = 'expired';
        } elseif ($transactionStatus === 'cancel') {
            // Transaksi dibatalkan
            $transaction->status = 'canceled';
        }

        // Simpan perubahan status transaksi ke database
        $transaction->save();


        // Kirim respons ke Midtrans untuk konfirmasi callback
        return response()->json(['message' => 'Transaction updated successfully']);
    }
}
