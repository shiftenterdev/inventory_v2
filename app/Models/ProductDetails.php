<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    protected $guarded = [];

    public function _category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function _sub_category()
    {
        return $this->hasOne(Category::class, 'id', 'sub_category_id');
    }
}
