<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetails;
use App\Repo\CoreTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    private $product;
    private $product_details;

    public function __construct(Product $product, ProductDetails $product_details)
    {
        $this->product = $product;
        $this->product_details = $product_details;
    }

    public function get_index()
    {
        $products = Product::with('_details')->get();
        return view('admin.product.index')
            ->with(compact('products'));
    }

    public function get_create()
    {
        $categories = Category::where('cat_parent_id', '-1')->get();
        $brands = Brand::get(['id', 'brand_title']);

        return view('admin.product.create')
            ->with(compact('categories', 'brands'));
    }

    public function post_store(Request $request)
    {
        // $input = $request->except('_token');
        DB::beginTransaction();

        $input['product_code'] = CoreTrait::productCode();
        $input['product_title'] = $request->product_title;
        $input['product_description'] = $request->product_description;
        $input['product_status'] = $request->product_status;
        $input['product_price'] = $request->product_price;
        $input['product_image_id'] = $request->product_image_id;
        $return = $this->product->create($input);

        $details['brand_id'] = $request->brand_id;
        $details['category_id'] = $request->category_id;
        $details['sub_category_id'] = $request->sub_category_id;
        $details['product_id'] = $return->id;
        $this->product_details->create($details);

        DB::commit();

        return redirect('product');
    }

    public function get_edit($id)
    {
        $categories = Category::where('cat_parent_id', '-1')->get();
        $brands = Brand::get(['id', 'brand_title']);
        $product = Product::where('id', $id)->first();
        $sub_cat = Category::where('id', $product->pro_subcat_id)->first();
        $image = CoreTrait::imageById($product->pro_image_id);

        return view('admin.product.edit')
            ->with(compact('categories', 'product', 'sub_cat', 'brands', 'image'));
    }

    public function post_update($id, Request $request)
    {
        $input = $request->all();
        unset($input['_token']);
        Product::where('id', $id)->update($input);

        return redirect('/product');
    }

    public function get_delete($id)
    {
        Product::destroy($id);

        return redirect('product');
    }
}
