<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Category;
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

    public function get_create()
    {
        $categories = Category::where('cat_parent_id','-1')->get();
        return view('admin.product.create')
            ->with(compact('categories'));
    }

    public function post_store(Request $request)
    {
        Product::create($request->all());
        return redirect('/product');
    }

    public function get_edit($id)
    {
        $categories = Category::where('cat_parent_id','-1')->get();
        $product = Product::where('id',$id)->get();
        return view('admin.product.edit')
            ->with(compact('categories','product'));
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
