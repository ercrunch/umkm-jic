<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fullname',
        'phone',
        'address',
    ];

    // Relasi: Setiap alamat milik satu pengguna
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}