<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AuthAdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login.index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $admin = Auth::guard('admin')->user();
            if (in_array($admin->role, ['Super Admin', 'Admin'])) {
                return redirect()->route('dashboardAdmin')->with('success', 'Berhasil Login');
            }
        }

        return redirect()->back()->withErrors(['error' => 'Email dan Password Salah!']);
        
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Berhasil Logout');
    }
}
