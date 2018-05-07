<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = [];

    public function sub_category()
    {
        return $this->hasMany($this,'parent_id','id');
    }

    public function parent()
    {
        return $this->hasOne($this,'id','parent_id');
    }

    public function getProductCountAttribute()
    {
        return count($this->products);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'product_category');
    }
}
