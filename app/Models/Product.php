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

//    public function category()
//    {
//        return $this->hasOne(Category::class,'id','category_id');
//    }
    public function scopeCategoryList()
    {

        if(count($this->categories)) {
            $categoryList = [];
            foreach ($this->categories as $c) {
                $categoryList[] = $c->title;
            }
        }
        if(empty($categoryList)){
            return '';
        }
        return json_encode($categoryList);
    }

    public function getCategoryNamesAttribute()
    {
        $categoryList = [];
        if(count($this->categories)) {
            foreach ($this->categories as $c) {
                $categoryList[] = $c->title;
            }
        }
        return (implode(",",$categoryList));
    }

    public function getCategoryIdsAttribute()
    {
        $categoryList = [];
        foreach ($this->categories as $c){
            $categoryList[] = $c->id;
        }
        return $categoryList;
    }

    public function brand()
    {
        return $this->hasOne(Brand::class,'id','brand_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'product_category');
    }

}
