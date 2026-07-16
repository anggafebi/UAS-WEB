<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{ 

    public function up()
    {
        Schema::create('shoes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price'); // Ini dia yang kemungkinan hilang atau salah nama!
            $table->string('category')->default('Lifestyle');
            $table->integer('stock');
            $table->string('image_url')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    // 2. SAYA TAMBAHKAN FUNGSI DOWN (Standar bawaan Laravel)
    public function down()
    {
        Schema::dropIfExists('shoes');
    }

};