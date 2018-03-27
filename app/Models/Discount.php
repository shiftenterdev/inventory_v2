<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discounts';
    protected $guarded = [];

    public function product()
    {
        return $this->hasOne(Product::class, 'code', 'product_code');
    }
}
