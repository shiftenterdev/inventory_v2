<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::with('parent','products')->get();
        $trees = Category::select('id','parent_id as parent','title as text')->get();
        foreach ($trees as $t){
            $t->text = $t->text.' ('.$t->product_count.')';
            if($t->parent=="0"){
                $t->parent = "#";
            }
        }
        return view('admin.category.index')
            ->with(compact('categories','trees'));
    }

    public function create()
    {
        $categories = Category::get();

        return view('admin.category.create')
            ->with(compact('categories'));
    }

    public function store(Request $request)
    {
        Category::create($request->except('_token'));

        return redirect('/category')
            ->with('success', 'Category created');
    }

    public function edit($id)
    {
        $categories = Category::where('cat_parent_id', '-1')->get();
        $category = Category::where('id', $id)->first();

        return view('admin.category.edit')
            ->with(compact('category', 'categories'));
    }

    public function update($id, Request $request)
    {
        $input = $request->except('_token');
        Category::where('id', $id)->update($input);

        return redirect('/category')
            ->with('success', 'Category updated');
    }

    public function delete($id)
    {
        $check = Category::where('cat_parent_id', $id)->first();
        if (empty($check)) {
            Category::destroy($id);

            return redirect('/category')
                ->with('success', 'Category deleted');
        } else {
            return redirect('/category')
                ->with('error', 'Please remove sub category first');
        }
    }

    public function change(Request $request)
    {
        Category::where('id',$request->child)->update(['parent_id'=>$request->parent]);
        return response('Done',200);
    }

    public function products($id)
    {
        $category = Category::find($id);
        $products = Product::whereHas('categories', function ($query) use ($id){
            $query->where('id', $id);
        })->get();
        return view('admin.category.products',compact('products','category'));
    }
}
