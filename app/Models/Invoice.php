<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';
    protected $guarded = [];

    public function customer()
    {
        return $this->hasOne(Customer::class,'id','customer_id');
    }
}
