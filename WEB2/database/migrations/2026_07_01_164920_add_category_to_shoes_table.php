<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('shoes', function (Blueprint $table) {
            // Menambahkan kolom kategori setelah kolom harga
            $table->string('category')->default('Lifestyle');
        });
    }

    public function down()
    {
        Schema::table('shoes', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
};
