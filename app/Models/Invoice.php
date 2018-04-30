<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';
    protected $guarded = [];

    public function customer()
    {
        return $this->hasOne(InvoiceCustomer::class,'invoice_no','invoice_no');
    }

    public function products()
    {
        return $this->hasMany(InvoiceProduct::class,'invoice_no','invoice_no');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class,'invoice_no','invoice_no');
    }
}
