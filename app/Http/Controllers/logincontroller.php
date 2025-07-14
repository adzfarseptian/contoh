<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function tampilForm()
    {
        return view('login'); 
    }

    // Memproses data login
    public function prosesLogin(Request $request)
    {
        $data = $request->only('email', 'password');

        // Coba login
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        // Kalau gagal
        return back()->withErrors(['email' => 'Email atau password salah']);
    }
}
