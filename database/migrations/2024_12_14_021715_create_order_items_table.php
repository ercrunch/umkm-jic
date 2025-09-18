<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // Foreign key untuk relasi ke tabel orders
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Foreign key untuk relasi ke tabel products
            $table->integer('quantity'); // Jumlah produk yang dibeli
            $table->string('color_code'); // Warna produk
            $table->timestamps(); // Timestamps untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
