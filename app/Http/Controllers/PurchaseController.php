<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PurchaseController extends Controller 
{

	public function __construct()
	{
		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function get_index()
	{
		$phones= Customer::get(['customer_phone','customer_id']);
		$products = Product::get(['pro_code']);
		if(Session::has('buy_items')){
			$temp_pro = Session::get('buy_items');
			$temp_pro = json_decode(json_encode($temp_pro), FALSE);
		}else{
			$temp_pro = 0;
		}
		return view('admin.buy.index')
			->with(compact('products','temp_pro','phones'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function get_product_list()
	{
		if(Session::has('buy_items')){
			$temp_pro = Session::get('buy_items');
			$temp_pro = json_decode(json_encode($temp_pro), FALSE);
		}else{
			$temp_pro = [];
		}
		return view('admin.buy.product_list')
			->with(compact('products','temp_pro'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function post_store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function history()
	{
		return view('admin.buy.history');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
