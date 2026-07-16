<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Shoe;
use Illuminate\Http\Request;

class ShoeApiController extends Controller
{
    public function index(Request $request)
    {
        $query = Shoe::query();

        // Tetap pertahankan fitur filter kategori yang sudah kita buat tadi
        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        $shoes = $query->latest()->get();

        // Perhatikan bagian ini: kita mengembalikan data dalam format JSON, bukan view()
        return response()->json([
            'success' => true,
            'message' => 'Daftar Katalog Sepatu',
            'data'    => $shoes
        ]);
    }
}