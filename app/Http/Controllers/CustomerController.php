<?php

namespace app\Http\Controllers;

use App\Models\Customer;
use App\Repo\CoreTrait;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('access:customer');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
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
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['customer_no'] = CoreTrait::customerId();
        unset($input['_token']);
        Customer::create($input);

        return redirect('/customer')
                ->with('success', 'Customer Added');
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
        $customer = Customer::find($id);
        $image = CoreTrait::imageById($customer->customer_logo_id);

        return view('admin.customer.edit')
                ->with(compact('customer', 'image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $input = $request->all();
        unset($input['_token']);
        Customer::where('id', $id)->update($input);

        return redirect('/customer')
                ->with('success', 'Customer Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function delete($id)
    {
        Customer::destroy($id);

        return redirect('/customer')
                ->with('success', 'Customer Deleted Successfully');
    }

    public function search(Request $request)
    {
        return Customer::where('mobile','LIKE','%'.$request->term.'%')
            ->select('id','mobile','name','address','email')
            ->get()
            ->toArray();
    }
}
