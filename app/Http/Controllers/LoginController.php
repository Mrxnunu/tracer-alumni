<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        // validasi untuk login
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        // dd('berhasillogin');
        // jika login berhasil 
        if (Auth::attempt($credentials)) {
            // sesion fix session
            $request->session()->regenerate();
            // mengalihkan user ke halaman depan
            return redirect()->intended('/dashboard');
        }

        // jika gagal
        return back()->with('loginError', 'Login failed! Email / Password Salah');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
