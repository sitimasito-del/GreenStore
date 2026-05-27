<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ===============================
    // LOGIN
    // ===============================

    public function login()
    {
        return view('login');
    }

    // ===============================
    // PROSES LOGIN
    // ===============================

    public function authLogin(Request $request)
    {
        $credentials = $request->validate([

            'email' => 'required|email',

            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            // ADMIN PUSAT

            if(Auth::user()->role == 'admin_pusat')
            {
                return redirect('/admin/dashboard');
            }

            // ADMIN GUNUNG

            if(Auth::user()->role == 'admin_gunung')
            {
                return redirect('/admin/laporans');
            }

            // USER

            return redirect('/');
        }

        return back()->with(

            'error',

            'Email atau password salah'
        );
    }

    // ===============================
    // REGISTER
    // ===============================

    public function register()
    {
        return view('register');
    }

    // ===============================
    // SIMPAN REGISTER
    // ===============================

    public function storeRegister(Request $request)
    {
        $request->validate([

            'name' => 'required',

            'email' => 'required|email|unique:users',

            'password' => 'required|min:6'
        ]);

        User::create([

            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make(
                $request->password
            ),

            'role' => 'user'
        ]);

        return redirect('/login')
            ->with(
                'success',
                'Register berhasil'
            );
    }

    // ===============================
    // PROFILE USER
    // ===============================

    public function profile()
    {
        return view('profile');
    }

    // ===============================
    // LOGOUT
    // ===============================

    public function logout()
    {
        Auth::logout();

        return redirect('/')
            ->with(
                'success',
                'Berhasil logout'
            );
    }
}