<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 4/19/2018
 * Time: 3:29 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(FoodCategory::class);
    }
}