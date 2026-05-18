<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // HALAMAN LOGIN
    public function login()
    {
        return view('auth.login');
    }

    // PROSES LOGIN
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([

            'email' => 'required|email',

            'password' => 'required'

        ]);

        if(Auth::attempt($credentials)){

            $request->session()->regenerate();

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
        return view('auth.register');
    }

    // SIMPAN USER
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',

            'email' => 'required|email|unique:users',

            'password' => 'required|min:6'

        ]);

        User::create([

            'name' => $request->name,

            'email' => $request->email,

            'password' => bcrypt($request->password),

            'role' => 'user'

        ]);

        return redirect('/login')->with(

            'success',

            'Register berhasil'
        );
    }

    // LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}