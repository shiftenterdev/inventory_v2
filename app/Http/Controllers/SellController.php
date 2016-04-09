<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Sell;
use App\Models\InvoiceProduct;
use App\Repo\CoreTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SellController extends Controller 
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
		//Session::forget('sell_items');
		$products = Product::get(['pro_code']);
		if(Session::has('sell_items')){
			$temp_pro = Session::get('sell_items');
			$temp_pro = json_decode(json_encode($temp_pro), FALSE);
		}else{
			$temp_pro = 0;
		}
		return view('admin.sell.index')
			->with(compact('products','temp_pro','phones'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function get_product_list()
	{
		if(Session::has('sell_items')){
			$temp_pro = Session::get('sell_items');
			$temp_pro = json_decode(json_encode($temp_pro), FALSE);
		}else{
			$temp_pro = [];
		}
		return view('admin.sell.product_list')
			->with(compact('products','temp_pro'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function get_invoice()
	{
		$customer = Session::get('sell_customer');
		$customer = json_decode(json_encode($customer), FALSE);
		$products = Session::get('sell_items');
		$products = json_decode(json_encode($products), FALSE);
		return view('admin.sell.invoice')
			->with(compact('customer','products'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function post_store(Request $request)
	{
		$input = $request->all();
		unset($input['_token']);
		$customer = Session::get('sell_customer');
		if($customer['customer_id']==''){
			$customer['customer_id'] = CoreTrait::customerId();
			$customer = Customer::create($customer);
		}
		$input['customer_id'] = $customer['customer_id'];
		$input['invoice_id'] = CoreTrait::SellInvoiceId();
		Sell::create($input);
		$products = Session::get('sell_items');
		foreach ($products as $key => $p) {
			unset($p['pro_title']);
			$p['invoice_id'] = $input['invoice_id'];
			InvoiceProduct::create($p);
		}
		Session::forget('sell_customer');
		Session::forget('sell_items');
		return redirect('sell')
			->with('success','Invoice Saved');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function history()
	{
		$sells = Sell::all();
		return view('admin.sell.history')
			->with(compact('sells'));
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
