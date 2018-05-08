<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';
    protected $guarded = [];

    public function getTotalAmountAttribute()
    {
        $t = 0;
        foreach ($this->products as $p) {
            $t += $p->price * $p->quantity;
        }
        $t += $this->tax / 100 * $t;
        $t += $this->delivery_charge;
        return $t;
    }

    public function getPaidAttribute()
    {
        return $this->payments->sum('amount');
    }

//    public function customer()
//    {
//        return $this->hasOne(InvoiceCustomer::class,'invoice_no','invoice_no');
//        return $this->customers();
//    }

    public function products()
    {
        return $this->hasMany(InvoiceProduct::class,'invoice_no','invoice_no');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class,'invoice_no','invoice_no');
    }

    public function customers()
    {
        return $this->belongsToMany(Customer::class,'invoice_customers');
    }
}
