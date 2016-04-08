<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repo\CoreTrait;
use App\Models\Product;
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
        return view('admin.home')
        	->with(compact('products'));
    }

}
