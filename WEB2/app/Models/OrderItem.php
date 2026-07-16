<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    // MASUKKAN ATRIBUTNYA DI SINI
    protected $fillable = [
        'order_id', 
        'shoe_id', 
        'shoe_name', 
        'quantity', 
        'price'
    ];
}