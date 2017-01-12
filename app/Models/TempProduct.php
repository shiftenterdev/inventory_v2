<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempProduct extends Model
{
    protected $table = 'temp_product_list';
    protected $guarded = [];

    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
}
