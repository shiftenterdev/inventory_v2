<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}
    
    public function get_index()
    {
        $products = Product::all();
        return view('admin.product.index')
            ->with(compact('products'));
    }

    public function post_update($id,Request $request)
    {

    }

    public function get_delete($id)
    {
        Product::destroy($id);
        return redirect('product');
    }

}
