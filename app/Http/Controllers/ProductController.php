<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProductController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}
    
    public function get_index()
    {
        return view('admin.product.index');
    }

}
