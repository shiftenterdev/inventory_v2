<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model 
{

	protected $table = 'sells';
	protected $guarded = [];

	public function customer()
	{
		return $this->hasOne('App\Models\Customer','customer_id','customer_id');
	}

	public function products()
	{
		return $this->hasMany('App\Models\InvoiceProduct','invoice_id','invoice_id');
	}

}
