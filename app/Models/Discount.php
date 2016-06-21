<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'product_discount';
    protected $guarded = [];

    public function _product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
