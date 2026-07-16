<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use Illuminate\Http\Request;

class ShoeController extends Controller
{
    // Fungsi index ini yang bertugas memproses data ke halaman Home
    public function index(Request $request) 
    {
        // 1. Siapkan kerangka pencarian ke database
        $query = Shoe::query();

        // 2. Cek apakah di URL terdapat filter kategori (contoh: /?category=Running)
        if ($request->has('category')) {
            // Jika ada, saring data sepatu khusus untuk kategori tersebut
            $query->where('category', $request->category);
        }

        // 3. Ambil datanya dan urutkan dari yang terbaru
        $shoes = $query->latest()->get();

        // 4. Kirim data yang sudah disaring ke halaman home
        return view('home', compact('shoes'));
    }

    // Fungsi untuk menampilkan detail satu sepatu
    public function show($id)
    {
        $shoe = Shoe::findOrFail($id);
        return view('show', compact('shoe'));
    }
}