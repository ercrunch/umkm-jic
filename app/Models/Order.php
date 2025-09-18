<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'address_id', 'total_amount', 'order_number', 'order_date'
    ];
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
    // Relasi dengan OrderItems
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
