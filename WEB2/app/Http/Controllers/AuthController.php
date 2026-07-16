<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Jika yang login adalah admin, arahkan ke dashboard sepatu
            if (auth()->user()->role === 'admin') {
                return redirect()->intended('/admin/shoes');
            }
            
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // 1. Validasi input dari user
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // 'confirmed' butuh field password_confirmation
        ]);

        // 2. Simpan user baru ke database (role otomatis 'user' sesuai default di database)
        $user = \App\Models\User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => 'user', 
        ]);

        // 3. Langsung login-kan user tersebut setelah berhasil mendaftar
        Auth::login($user);

        // 4. Arahkan ke halaman utama
        return redirect('/')->with('success', 'Registrasi berhasil! Selamat datang di Nike Store.');
    }
}