<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Sell;
use App\Models\InvoiceProduct;
use App\Models\TempProduct;
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
        $invoice_no = CoreTrait::SellInvoiceId();
        return redirect('sell/new/' . $invoice_no);
        //Session::forget('sell_items');

//        if (Session::has('sell_items')) {
//            $temp_pro = Session::get('sell_items');
//            $temp_pro = json_decode(json_encode($temp_pro), false);
//        } else {
//            $temp_pro = 0;
//        }


    }

    public function get_new($invoice_no)
    {

        $invoice = Invoice::where('invoice_no', $invoice_no)->first();
        if (empty($invoice)) {
            $invoice = new Invoice();
            $invoice->invoice_no = $invoice_no;
            $invoice->delivery_charge = 0;
            $invoice->tax = 0;
            $invoice->type = 'sell';
            $invoice->is_locked = 0;
            $invoice->save();
        }
        session(['invoice_id' => $invoice->id]);
        $products = Product::get(['pro_code', 'pro_title']);
        $temp_pro = TempProduct::with('product')->where('type', 'sell')->get();
        $invoice = Invoice::find(session('invoice_id'));
        return view('admin.sell.index')
            ->with(compact('products', 'temp_pro','invoice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function get_product_list()
    {
        $temp_pro = TempProduct::where('type', 'sell')->get();
        $products = Product::get(['pro_code', 'pro_title']);
        $invoice = Invoice::find(session('invoice_id'));
        return view('admin.sell.product_list')
            ->with(compact('products', 'temp_pro', 'invoice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function get_invoice()
    {
        $customer = Session::get('sell_customer');
        $customer = json_decode(json_encode($customer), false);
        $products = TempProduct::with('product')->get();

        return view('admin.sell.invoice')
            ->with(compact('customer', 'products'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function post_store(Request $request)
    {
        $input = $request->all();
        unset($input['_token']);
        $customer = Session::get('sell_customer');
        if ($customer['customer_id'] == '') {
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

        return redirect('sell/view/' . $input['invoice_id'])
            ->with('success', 'Invoice Saved');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function history()
    {
        $sells = Invoice::where('type','sell')
            ->where('is_locked',1)
            ->with('customer','products')->get();



        return view('admin.sell.history')
            ->with(compact('sells'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function get_view($sell_id)
    {
        $result = Sell::with('customer', 'products')->where('invoice_id', $sell_id)->first();

        return view('admin.sell.view')
            ->with(compact('result'));
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

    public function post_add_product(Request $request)
    {
        $product = Product::where('pro_code', $request->pro_code)->first();
        $temp = TempProduct::where('type', 'sell')
            ->where('invoice_id',session('invoice_id'))
            ->where('product_id', $product->id)->first();
        if (!empty($temp)) {
            $temp->quantity = $temp->quantity + 1;
        } else {
            $temp = new TempProduct();
            $temp->product_id = $product->id;
            $temp->invoice_id = session('invoice_id');
            $temp->quantity = 1;
            $temp->discount = 0;
            $temp->type = 'sell';
        }

        $temp->save();
    }

    public function get_remove_product($pro_code)
    {
        $product_id = Product::where('pro_code', $pro_code)->pluck('id');
        TempProduct::where('product_id', $product_id)->where('type', 'sell')->delete();
    }

    public function get_update_product($pro_code, $quantity)
    {
        $product_id = Product::where('pro_code', $pro_code)->pluck('id');
        $temp = TempProduct::where('product_id', $product_id)->where('type', 'sell')->first();
        $temp->quantity = $quantity;
        $temp->save();
    }

    public function get_discount_product($pro_code, $discount)
    {
        $product_id = Product::where('pro_code', $pro_code)->pluck('id');
        $temp = TempProduct::where('product_id', $product_id)->where('type', 'sell')->first();
        $temp->discount = $discount;
        $temp->save();
    }

    public function get_add_tax($tax)
    {
        $invoice = Invoice::find(session('invoice_id'));
        $invoice->tax = $tax;
        $invoice->save();
    }

    public function get_add_charge($charge)
    {
        $invoice = Invoice::find(session('invoice_id'));
        $invoice->delivery_charge = $charge;
        $invoice->save();
    }

    public function post_save_invoice(Request $request)
    {
//        dd($request->all());

        $invoice_id = session('invoice_id');
        $temp = TempProduct::where('invoice_id',$invoice_id)->get();

        foreach($temp as $t){
            $invoice_product = new InvoiceProduct();
            $invoice_product->invoice_id = session('invoice_id');
            $invoice_product->product_id = $t->product_id;
            $invoice_product->quantity = $t->quantity;
            $invoice_product->discount = $t->discount;
            $invoice_product->save();
        }

        $customer = Customer::where('customer_phone',$request->customer_phone)->first();
        if(empty($customer)){
            $customer = new Customer();
            $customer->customer_phone = $request->customer_phone;
        }
        $customer->customer_email = $request->customer_email;
        $customer->customer_address = $request->customer_address;
        $customer->customer_name = $request->customer_name;
        $customer->save();

        $invoice = Invoice::find(session('invoice_id'));
        $invoice->customer_id = $customer->id;
        $invoice->is_locked = 1;
        $invoice->type = 'sell';
        $invoice->save();

        TempProduct::where('invoice_id',$invoice_id)->delete();
        return redirect('sells-history');

    }
}
