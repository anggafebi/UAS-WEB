<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // MASUKKAN ATRIBUTNYA DI SINI
    protected $fillable = [
        'customer_name', 
        'customer_phone', 
        'customer_address', 
        'total_price'
    ];
}