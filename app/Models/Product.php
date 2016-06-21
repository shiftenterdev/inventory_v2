<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function _details()
    {
        return $this->hasOne(ProductDetails::class, 'product_id', 'id');
    }

    public function _discount()
    {
    	return $this->hasOne(Discount::class,'product_id','id');
    }
}
