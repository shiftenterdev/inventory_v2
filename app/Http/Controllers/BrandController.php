<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Brand;
use App\Repo\CoreTrait;
use Illuminate\Http\Request;

class BrandController extends Controller
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
		$brands = Brand::all();
		foreach($brands as $b){
			$b->logo = CoreTrait::imageById($b->brand_logo_id);
		}
		return view('admin.brand.index')
				->with(compact('brands'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function get_create()
	{
		return view('admin.brand.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function post_store(Request $request)
	{
		$input = $request->all();
		unset($input['_token']);
		Brand::create($input);
		return redirect('/brand');
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
		$brand = Brand::where('id',$id)->first();
		$image = CoreTrait::imageById($brand->brand_logo_id);
		return view('admin.brand.edit')
			->with(compact('brand','image'));
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
		Brand::where('id',$id)->update($input);
		return redirect('/brand')
			->with('success','Brand Updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function get_delete($id)
	{
		Brand::destroy($id);
		return redirect('/brand')
			->with('success','Brand Deleted Successfully');
	}

}
