<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','email','mobile','status'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function roles()
    {
        return $this->belongsToMany(Role::class,'user_role');
    }

    public function hasRole($slug)
    {
        foreach ($this->roles as $r){
            if($r->slug == $slug){
                return true;
            }
        }
        return false;
    }

    public function hasPermission($slug)
    {
        foreach ($this->roles as $r){
            foreach ($r->permissions as $p) {
                if ($p->slug == $slug) {
                    return true;
                }
            }
        }
        return false;
    }
}
