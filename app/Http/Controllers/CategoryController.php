<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_index()
    {
        $categories = Category::all();
        foreach($categories as $c){
            if($c->cat_parent_id=='-1'){
                $c->parent = '-';
            }else{
                $c->parent = Category::where('id',$c->cat_parent_id)->pluck('cat_title');
            }
        }
        return view('admin.category.index')
            ->with(compact('categories'));
    }

    public function get_create()
    {
        $categories = Category::all();
        return view('admin.category.create')
            ->with(compact('categories'));
    }

    public function post_store(Request $request)
    {
        Category::create($request->all());
        return redirect('/category')
            ->with('success','Category created');
    }

    public function get_edit($id)
    {
        $categories = Category::all();
        $category = Category::where('id',$id)->first();
        return view('admin.category.edit')
            ->with(compact('category','categories'));
    }

    public function post_update($id,Request $request)
    {
        $input = $request->all();
        unset($input['_token']);
        Category::where('id',$id)->update($input);
        return redirect('/category')
            ->with('success','Category updated');
    }

    public function get_delete($id)
    {
        Category::destroy($id);
        return redirect('/category')
            ->with('success','Category deleted');
    }

}
