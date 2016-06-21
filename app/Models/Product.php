<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function _details()
    {
        return $this->hasOne(ProductDetails::class, 'product_id', 'id');
    }

}
