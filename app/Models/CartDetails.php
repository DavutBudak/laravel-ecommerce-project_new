<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetails extends Model
{
    use HasFactory;

    protected $primaryKey = "cart_detail_id";

    protected $fillable = [
        'cart_detail_id',
        'cart_id',
        'product_id',
        'quantity',
    ];

    public function product(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Product::class, "product_id", "product_id");
    }
}
