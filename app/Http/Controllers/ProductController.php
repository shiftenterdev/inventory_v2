<?php

namespace App\Http\Controllers;

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
        $products = Product::with('details')->get();

        return view('admin.product.index')
            ->with(compact('products'));
    }

    public function get_create()
    {
        $categories = Category::with('parent')->get();
        foreach ($categories as $c) {
            if ($c->parent) {
                $c->full_category = $c->parent->cat_title.' > '.$c->cat_title;
            }else{
                $c->full_category = $c->cat_title;
            }
        }

        $brands = Brand::get(['id', 'brand_title']);

        return view('admin.product.create')
            ->with(compact('categories', 'brands'));
    }

    public function post_store(Request $request)
    {
        // $input = $request->except('_token');
        DB::beginTransaction();

        $product = new Product();
        $product->pro_code = $request->pro_code;
        $product->pro_title = $request->pro_title;
        $product->brand_id = $request->brand_id;
        $product->pro_description = $request->pro_description;
        $product->pro_status = $request->pro_status;
        $product->category_id = $request->category_id;
        $product->pro_price = $request->pro_price;
        $product->pro_image_id = $request->pro_image_id;
        $product->save();

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
        $input = $request->except('_token');
        $this->product->where('id', $id)->update($input);

        return redirect('/product');
    }

    public function get_delete($id)
    {
        $this->product->destroy($id);

        return redirect('product');
    }
}
