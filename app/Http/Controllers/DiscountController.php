<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    private $discount;

    public function __construct(Discount $discount)
    {
        $this->middleware('access:discount');
        $this->discount = $discount;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $discount = $this->discount->with('product')->get();

        return view('admin.discount.index')
            ->with(compact('discount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $products = Product::get(['id', 'title', 'code']);

        return view('admin.discount.create', ['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $discount = new $this->discount;
        $discount->discount_type = $request->discount_type;
        $discount->product_code = $request->product_code;
        $discount->status = $request->status;
        $discount->discount = $request->discount;
        $discount->save();
//        $this->discount->fill($request->except('_token'))->save();

        return redirect('discount');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $discount = $this->discount->find($id);
        $products = Product::get(['id', 'title', 'code']);
        return view('admin.discount.edit')->with(compact('discount','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id,Request $request)
    {
        $discount = $this->discount->find($id);
        $discount->discount_type = $request->discount_type;
        $discount->product_code = $request->product_code;
        $discount->status = $request->status;
        $discount->discount = $request->discount;
        $discount->save();
        return redirect('discount');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function get_delete($id)
    {
        $this->discount->destroy($id);

        return redirect('discount');
    }
}
