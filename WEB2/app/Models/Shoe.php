<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shoe extends Model
{
    // Jika tabel kamu di phpMyAdmin tidak punya kolom created_at & updated_at, biarkan baris ini
    public $timestamps = false; 

    // Tambahkan 'category' ke dalam array
    protected $fillable = ['name', 'price', 'category', 'stock', 'image_url', 'description'];
}