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

    public function details()
    {
        return $this->hasMany(InvoiceProduct::class,'invoice_no','invoice_no');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class,'invoice_no','invoice_no');
    }
}
