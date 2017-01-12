<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function details()
    {
        return $this->hasOne(ProductDetails::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function brand()
    {
        return $this->hasOne(Brand::class,'id','brand_id');
    }

}
