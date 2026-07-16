<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Shoe;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Menampilkan isi keranjang
    public function index()
    {
        // Ambil data keranjang dari database khusus untuk user yang sedang login
        // (Pastikan relasi 'shoe' dipanggil agar kita bisa menampilkan nama & harga sepatu)
        $cart = Cart::with('shoe')->where('user_id', auth()->id())->get();
        
        // Kirim data $cart ke file tampilan cart.blade.php
        return view('cart', compact('cart'));
    }
    // ---> Tanda '}' ekstra yang salah tadi sudah saya hapus dari sini <---

    // Menambah sepatu ke keranjang
    public function add(Request $request, $shoe_id)
    {
        $user_id = Auth::id();

        // Cek apakah sepatu ini sudah ada di keranjang user tersebut
        $cart = Cart::where('user_id', $user_id)->where('shoe_id', $shoe_id)->first();

        if ($cart) {
            // Jika sudah ada, tambah jumlahnya
            $cart->increment('quantity');
        } else {
            // Jika belum ada, buat record baru di tabel carts
            Cart::create([
                'user_id' => $user_id,
                'shoe_id' => $shoe_id,
                'quantity' => 1
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Sepatu berhasil ditambahkan ke keranjang!');
    }

    // Menghapus item dari keranjang
    public function remove($id)
    {
        // Pastikan yang dihapus hanya keranjang milik user yang login
        Cart::where('id', $id)->where('user_id', Auth::id())->delete();
        
        return back()->with('success', 'Sepatu berhasil dihapus dari keranjang.');
    }

    // Menambah jumlah 1 item
    public function increment($id)
    {
        $cart = Cart::where('id', $id)->where('user_id', Auth::id())->first();
        if ($cart) {
            $cart->increment('quantity');
        }
        return back();
    }

    // Mengurangi jumlah 1 item
    public function decrement($id)
    {
        $cart = Cart::where('id', $id)->where('user_id', Auth::id())->first();
        if ($cart) {
            if ($cart->quantity > 1) {
                // Jika jumlahnya lebih dari 1, kurangi 1
                $cart->decrement('quantity');
            } else {
                // Jika jumlahnya 1 lalu dikurangi, hapus barang dari keranjang
                $cart->delete();
            }
        }
        return back();
    }
}