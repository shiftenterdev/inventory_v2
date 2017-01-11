<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = [];

    public function sub_category()
    {
        return $this->hasMany($this,'cat_parent_id','id');
    }

    public function parent()
    {
        return $this->hasOne($this,'id','cat_parent_id');
    }
}
