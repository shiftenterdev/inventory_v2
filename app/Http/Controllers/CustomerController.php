<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Customer;
use App\Repo\CoreTrait;
use Illuminate\Http\Request;

class CustomerController extends Controller
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
		$customers = Customer::all();
		return view('admin.customer.index')
				->with(compact('customers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function get_create()
	{
		return view('admin.customer.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function post_store(Request $request)
	{
		$input = $request->all();
		$input['customer_id'] = CoreTrait::customerId();
		unset($input['_token']);
		Customer::create($input);
		return redirect('/customer')
				->with('success','Customer Added');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function get_edit($id)
	{
		$customer = Customer::find($id);
		$image = CoreTrait::imageById($customer->customer_logo_id);
		return view('admin.customer.edit')
				->with(compact('customer','image'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function post_update($id,Request $request)
	{
		$input = $request->all();
		unset($input['_token']);
		Customer::where('id',$id)->update($input);
		return redirect('/customer')
				->with('success','Customer Updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function get_delete($id)
	{
		Customer::destroy($id);
		return redirect('/customer')
				->with('success','Customer Deleted Successfully');
	}

}
