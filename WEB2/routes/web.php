<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShoeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminShoeController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\AdminOrderController;

// =========================================================
// 1. RUTE PUBLIK (Bisa diakses siapa saja tanpa login)
// =========================================================
Route::get('/', [ShoeController::class, 'index']);
Route::get('/shoe/{id}', [ShoeController::class, 'show'])->name('shoe.show');

// =========================================================
// 2. RUTE AUTENTIKASI (Halaman Login & Register)
// =========================================================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.process');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

// =========================================================
// 3. RUTE PEMBELI / USER (Wajib Login)
// =========================================================
Route::middleware(['auth'])->group(function () {
    
    // Fitur Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Keranjang Belanja
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    
    // Fitur tambah/kurang kuantitas di keranjang
    Route::patch('/cart/increment/{id}', [CartController::class, 'increment'])->name('cart.increment');
    Route::patch('/cart/decrement/{id}', [CartController::class, 'decrement'])->name('cart.decrement');

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/success/{id}', [CheckoutController::class, 'success'])->name('checkout.success');
    
});

// =========================================================
// 4. RUTE ADMIN
// =========================================================
Route::middleware(['auth', IsAdmin::class])->group(function () {
    
    // Manajemen CRUD Sepatu
    Route::get('/admin/shoes', [AdminShoeController::class, 'index'])->name('shoes.index');
    Route::get('/admin/shoes/create', [AdminShoeController::class, 'create'])->name('shoes.create');
    Route::post('/admin/shoes', [AdminShoeController::class, 'store'])->name('shoes.store');
    Route::get('/admin/shoes/{id}/edit', [AdminShoeController::class, 'edit'])->name('shoes.edit');
    Route::put('/admin/shoes/{id}', [AdminShoeController::class, 'update'])->name('shoes.update');
    Route::delete('/admin/shoes/{id}', [AdminShoeController::class, 'destroy'])->name('shoes.destroy');
    Route::get('/admin/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');

});