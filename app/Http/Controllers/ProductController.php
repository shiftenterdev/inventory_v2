<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\InvoiceProduct;
use App\Models\Product;
use App\Models\ProductDetails;
use App\Repo\CoreTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Unisharp\Laravelfilemanager\traits\LfmHelpers;

class ProductController extends Controller
{

    use LfmHelpers;

    public function index()
    {
        $products = Product::with('categories', 'brand')->get();

        return view('admin.product.index')
            ->with(compact('products'));
    }

    public function create()
    {
        $categories = Category::with('parent')->get();
        $brands = Brand::get(['id', 'title']);

        return view('admin.product.create')
            ->with(compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
        if($request->ajax()){
            $request->merge(['code'=>CoreTrait::productCode()]);
            Product::create($request->except('_token','category_id'))->categories()->sync($request->category_id);
            return response('Product Added Successfully',200);
        }
        $request->merge(['code'=>CoreTrait::productCode()]);
        $product = Product::create($request->except('_token','category_id'));
        Product::find($product)->categoties()->sync($request->category_id);
        return redirect('product');
    }

    public function edit($id)
    {
        $categories = Category::with('parent')->get();
        foreach ($categories as $c) {
            if ($c->parent) {
                $c->full_category = $c->parent->title . ' > ' . $c->title;
            } else {
                $c->full_category = $c->title;
            }
        }
        $brands = Brand::get(['id', 'title']);
        $product = Product::where('id', $id)->first();

        return view('admin.product.edit')
            ->with(compact('categories', 'product', 'brands'));
    }

    public function update($id, Request $request)
    {
        $product = Product::find($id);
        $product->update($request->except('_token','category_id'));
        $product->categories()->sync($request->category_id);
        return redirect('/product');
    }

    public function delete($id)
    {
        Product::destroy($id);
        return redirect('product');
    }

    public function search(Request $request)
    {
        $exist_product = [];
        if ($request->invoice_no) {
            $exist_product = InvoiceProduct::where('invoice_no', $request->invoice_no)->lists('product_code');
        }
        return Product::where('code', 'LIKE', '%' . $request->term . '%')
            ->orWhere('title', 'LIKE', '%' . $request->term . '%')
            ->whereNotIn('code', $exist_product)
            ->select('id', 'title', 'code')
            ->get()->toArray();
    }
}
