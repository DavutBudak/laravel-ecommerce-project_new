<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey="product_id";



    protected $fillable=[
        "product_id",
         "category_id",
         "name",
         "price",
         "old_price",
         "lead",
         "description",
         "slug",
         "is_active",

    ];

public function category(): \Illuminate\Database\Eloquent\Relations\HasOne
{
    return $this->hasOne(Category::class,"category_id","category_id");
}


public function images(){
    return $this->HasMany(ProductImage::class , "product_id","product_id");
}

}
