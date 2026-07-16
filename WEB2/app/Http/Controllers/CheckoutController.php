<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shoe;
use App\Models\Cart; // Wajib dipanggil karena kita ambil dari database
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        // Ambil keranjang dari database milik user yang login
        $cart = Cart::with('shoe')->where('user_id', Auth::id())->get();

        if ($cart->isEmpty()) {
            return redirect('/')->with('error', 'Keranjang Anda kosong!');
        }
        return view('checkout', compact('cart'));
    }

    public function process(Request $request)
    {
        $cart = Cart::with('shoe')->where('user_id', Auth::id())->get();

        if ($cart->isEmpty()) {
            return redirect('/');
        }

        // 1. Hitung total harga
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item->shoe->price * $item->quantity;
        }

        // 2. Simpan data pembeli ke tabel orders
        $order = Order::create([
            'customer_name' => $request->name,
            'customer_phone' => $request->phone,
            'customer_address' => $request->address,
            'total_price' => $totalPrice,
        ]);

        // 3. Simpan detail sepatu ke tabel order_items & Kurangi Stok
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'shoe_id' => $item->shoe_id,
                'shoe_name' => $item->shoe->name,
                'quantity' => $item->quantity,
                'price' => $item->shoe->price,
            ]);

            // Kurangi stok di database master sepatu
            if ($item->shoe) {
                $item->shoe->decrement('stock', $item->quantity);
            }
        }

        // 4. Kosongkan keranjang di database khusus untuk user ini
        Cart::where('user_id', Auth::id())->delete();

        // 5. Alihkan ke halaman nota bukti transaksi
        return redirect()->route('checkout.success', $order->id);
    }

    public function success($id)
    {
        $order = Order::findOrFail($id);
        $orderItems = OrderItem::where('order_id', $id)->get();

        return view('checkout_success', compact('order', 'orderItems'));
    }
}