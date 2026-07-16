<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user sudah login DAN memiliki role admin
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request); // Silakan masuk
        }

        // Jika bukan admin, tendang kembali ke halaman utama
        return redirect('/')->with('error', 'Akses ditolak! Anda bukan admin.');
    }
}
