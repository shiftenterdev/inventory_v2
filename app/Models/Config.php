<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 3/28/2018
 * Time: 1:40 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'configs';
    protected $guarded = [];
    public $timestamps = false;
}