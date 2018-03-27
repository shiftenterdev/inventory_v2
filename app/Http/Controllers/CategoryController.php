<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::with('parent')->get();
        foreach ($categories as $c) {
            if ($c->parent) {
                $c->full_category = $c->parent->cat_title.' > '.$c->cat_title;
            }else{
                $c->full_category = $c->cat_title;
            }
        }

        return view('admin.category.index')
            ->with(compact('categories'));
    }

    public function create()
    {
        $categories = Category::where('cat_parent_id', '-1')->get();

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
}
