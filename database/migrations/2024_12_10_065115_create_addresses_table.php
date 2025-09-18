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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Menyimpan ID pengguna
            $table->string('fullname');           // Nama lengkap
            $table->string('phone');              // Nomor telepon
            $table->text('address');              // Alamat
            $table->timestamps();                 // Tanggal pembuatan dan pembaruan

            // Menambahkan relasi dengan tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

};
