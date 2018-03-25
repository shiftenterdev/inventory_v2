<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $guarded = [];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'role_permission');
    }

    public function hasPermission($slug)
    {
        foreach ($this->permissions as $p){
            if($slug == $p->slug){
                return true;
            }
        }
        return false;
    }
}
