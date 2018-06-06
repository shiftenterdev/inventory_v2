<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 5/7/2018
 * Time: 2:38 PM
 */

namespace App\Http\Controllers;


use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        return view('admin.slider.index')->with([
            'sliders'=>Slider::get()
        ]);
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        Slider::create($request->except('_token'));
        return redirect('slider');
    }

    public function edit($id)
    {
        return view('admin.slider.edit')->with([
            'slider' => Slider::find($id)
        ]);
    }

    public function update(Request $request,$id)
    {
        Slider::find($id)->update($request->except('_token'));
        return redirect('slider');
    }
}