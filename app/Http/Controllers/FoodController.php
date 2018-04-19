<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 4/19/2018
 * Time: 3:28 PM
 */

namespace App\Http\Controllers;


use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    private function code()
    {
        $product_code = Food::orderBy('id', 'desc')->pluck('code');
        if (empty($product_code)) {
            $product_code = 'F1000001';
        } else {
            $product_code = str_replace('F', '', $product_code);
            $product_code = 'F'.(intval($product_code) + 1);
        }

        return $product_code;
    }

    public function index()
    {
        return view('admin.food.index')->with([
            'foods'=>Food::get(),
        ]);
    }

    public function create()
    {
        return view('admin.food.create')->with([
            'categories'=>FoodCategory::get()
        ]);
    }

    public function store(Request $request)
    {
        $request->merge(['code'=>$this->code()]);
        Food::create($request->except('_token'));
        return redirect('food');
    }
}