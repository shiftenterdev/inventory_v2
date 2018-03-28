<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceProduct extends Model
{
    protected $table = 'invoice_product';
    protected $guarded = [];

    public function product()
    {
        return $this->hasOne(Product::class,'code','product_code');
    }
}
