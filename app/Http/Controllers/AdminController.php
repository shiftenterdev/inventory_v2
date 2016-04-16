<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repo\CoreTrait;
use App\Models\Product;
use App\Models\Sell;
use Illuminate\Http\Request;

class AdminController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}
    
    public function get_index()
    {
    	$products = Product::all();
    	foreach($products as $p){
    		$p->image = CoreTrait::imageById($p->pro_image_id);
    	}
        $sells = Sell::with('products','customer')->limit(4)->orderBy('id','desc')->get();
        foreach ($sells as $key => $s) {
            $amount = 0;
            foreach($s->products as $p){
                $amount += floatval($p->pro_quantity)*floatval($p->pro_price);
            }
            $s->amount = $amount;
        }
        return view('admin.home')
        	->with(compact('products','sells'));
    }

}
