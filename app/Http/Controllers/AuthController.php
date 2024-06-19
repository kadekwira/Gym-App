<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Attempt to authenticate the user
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            // Check if the user is inactive
            if ($user->status == 'inactive') {
                // Logout the user
                Auth::logout();
    
                return redirect()->back()->withErrors(['error' => 'Akun Anda tidak aktif!']);
            }
    
            // User is authenticated and active
            return redirect()->route('dashboard.user')->with('success', 'Berhasil Login');
        }
    
        // Authentication failed, redirect back with an error message
        return redirect()->back()->withErrors(['error' => 'Email dan Password Salah!']);
    }
    

    public function loginView(){
        return view('user.login');
    }


    public function logout(){
        Auth::logout();
        return redirect()->route('dashboard.user')->with('success', 'Berhasil Logout');
    }
}
