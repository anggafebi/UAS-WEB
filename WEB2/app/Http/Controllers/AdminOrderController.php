<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        // Mengambil semua data pesanan, diurutkan dari yang paling baru
        $orders = Order::orderBy('created_at', 'desc')->get();
        
        return view('admin.orders.index', compact('orders'));
    }
}