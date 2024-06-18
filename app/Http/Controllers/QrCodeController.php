<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function generate()
    {
        $user = auth()->user();

        // Memeriksa apakah pengguna aktif
        if ($user && $user->status === 'active') {
            // Membuat QR Code dengan nilai dari ID pengguna
            $qrCode = QrCode::size(200)->generate($user->id);

            return view('user.qrcode', compact('qrCode'));
        } 
    }
}
