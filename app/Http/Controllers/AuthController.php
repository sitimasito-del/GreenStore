<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) {

            $request->session()->regenerate();

            // ROLE USER
            if(auth()->user()->role == 'user') {

                return redirect('/user/dashboard');

            }

            // SEMUA ADMIN
            return redirect('/admin/dashboard');
        }

        return back()->with('error', 'Login gagal');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}