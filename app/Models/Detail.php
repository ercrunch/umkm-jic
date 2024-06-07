<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    protected $fillable = [
        'product_id',
        'color_img_1',
        'color_img_2',
        'color_img_3',
        'detail_img_1',
        'detail_img_2',
        'detail_img_3'
    ];
}
