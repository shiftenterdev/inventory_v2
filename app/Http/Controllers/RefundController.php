<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Refund;
use App\Models\Customer;
use App\Models\Product;

class RefundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function get_index()
    {
        $products = Refund::all();

        return view('admin.refund.index')
            ->with(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function get_create()
    {
        $customer = Customer::get(['id', 'name']);
        $products = Product::get(['code', 'title']);

        return view('admin.refund.create')
            ->with(compact('customer', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function post_store()
    {
        //
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
