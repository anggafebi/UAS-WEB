<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // 1. Ini wajib ditambahkan!

class AdminShoeController extends Controller
{
    // 1. Tampilkan daftar semua sepatu di halaman admin
    public function index()
    {
        $shoes = Shoe::latest()->get();
        return view('admin.shoes.index', compact('shoes'));
    }

    // 2. Tampilkan form untuk menambah sepatu baru
    public function create()
    {
        return view('admin.shoes.create');
    }

    // 3. Simpan data sepatu baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image_file' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Ambil semua data kecuali gambar
        $data = $request->except('image_file');

        // Jika ada gambar yang diupload, proses dulu gambarnya
        if ($request->hasFile('image_file')) {
            $imagePath = $request->file('image_file')->store('shoes', 'public');
            // 2. Gunakan nama kolom yang benar: image_url
            $data['image_url'] = Storage::url($imagePath);
        }

        // 3. Setelah data lengkap (termasuk URL gambar), baru simpan ke database sekaligus
        Shoe::create($data);

        return redirect()->route('shoes.index')->with('success', 'Sepatu berhasil ditambahkan!');
    }

    // 4. Tampilkan detail sepatu tertentu (opsional)
    public function show(Shoe $shoe)
    {
        return view('admin.shoes.show', compact('shoe'));
    }

    // 5. Tampilkan form untuk mengedit data sepatu
    public function edit(Shoe $shoe)
    {
        return view('admin.shoes.edit', compact('shoe'));
    }

    // 6. Perbarui data sepatu di database
    public function update(Request $request, Shoe $shoe)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->except('image_file');

        if ($request->hasFile('image_file')) {
            $imagePath = $request->file('image_file')->store('shoes', 'public');
            $data['image_url'] = Storage::url($imagePath);
        }

        // Update database sekaligus
        $shoe->update($data);

        return redirect()->route('shoes.index')->with('success', 'Sepatu berhasil diperbarui!');
    }

    // 7. Hapus data sepatu dari database
    public function destroy(Shoe $shoe)
    {
        $shoe->delete();
        return redirect()->route('shoes.index')->with('success', 'Sepatu berhasil dihapus!');
    }
}