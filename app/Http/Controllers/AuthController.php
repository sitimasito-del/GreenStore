<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AuthController extends Controller
{
    // HALAMAN LOGIN
    public function login()
    {
        return view('login');
    }

    // PROSES LOGIN
    public function authLogin(Request $request)
    {
        $credentials = [

            'email' => $request->email,

            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            // ADMIN PUSAT
            if (Auth::user()->role == 'admin_pusat') {

                return redirect('/admin/dashboard');
            }

            // ADMIN GUNUNG
            if (Auth::user()->role == 'admin_gunung') {

                return redirect('/admin/dashboard');
            }

            // USER
            return redirect('/user/dashboard');
        }

        return back()->with(

            'error',

            'Email atau password salah'
        );
    }

    // HALAMAN REGISTER
    public function register()
    {
        return view('register');
    }

    // SIMPAN REGISTER
    public function storeRegister(Request $request)
    {
        $request->validate([

            'name' => 'required',

            'email' => 'required|email|unique:users,email',

            'password' => 'required|min:6',
        ]);

        User::create([

            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make(
                $request->password
            ),

            'role' => 'user'
        ]);

        return redirect('/login');
    }

    // LOGOUT
    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}