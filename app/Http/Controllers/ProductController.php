<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repo\CoreTrait;
use App\Models\Category;
use App\Models\Brand;
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
        foreach($products as $p){
            $p->category = CoreTrait::catById($p->pro_cat_id);
            $p->sub_category = CoreTrait::catById($p->pro_subcat_id);
        }
        return view('admin.product.index')
            ->with(compact('products'));
    }

    public function get_create()
    {
        $categories = Category::where('cat_parent_id','-1')->get();
        $brands = Brand::get(['id','brand_title']);
        return view('admin.product.create')
            ->with(compact('categories','brands'));
    }

    public function post_store(Request $request)
    {
        $input = $request->all();
        $input['pro_code'] = CoreTrait::productCode();
        unset($input['_token']);
        Product::create($input);
        return redirect('/product');
    }

    public function get_edit($id)
    {
        $categories = Category::where('cat_parent_id','-1')->get();
        $brands = Brand::get(['id','brand_title']);
        $product = Product::where('id',$id)->first();
        $sub_cat = Category::where('id',$product->pro_subcat_id)->first();
        $image = CoreTrait::imageById($product->pro_image_id);
        return view('admin.product.edit')
            ->with(compact('categories','product','sub_cat','brands','image'));
    }

    public function post_update($id,Request $request)
    {
        $input = $request->all();
        unset($input['_token']);
        Product::where('id',$id)->update($input);
        return redirect('/product');
    }

    public function get_delete($id)
    {
        Product::destroy($id);
        return redirect('product');
    }

}
