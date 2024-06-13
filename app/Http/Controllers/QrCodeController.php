<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    public function generate(User $user)
    {
        // URL untuk halaman member
        $url = route('member.show', $user->id);
        
        // Generate QR code dengan library Laravel
        $qrCode = QrCode::size(300)->generate($url);
        
        return view('qrcode', compact('qrCode', 'user'));
    }
}
