<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 4/19/2018
 * Time: 5:26 PM
 */

namespace App\Http\Controllers;


use App\Models\FoodCategory;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
    public function index()
    {
        return view('admin.food.category.index')->with([
            'categories' => FoodCategory::get()
        ]);
    }

    public function create()
    {
        return view('admin.food.category.create');
    }

    public function store(Request $request)
    {
        FoodCategory::create($request->except('_token'));
        return redirect('food/category');
    }
}