<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\TempProduct;
use App\Repo\CoreTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_index()
    {
        $invoice_no = CoreTrait::PurchaseInvoiceId();
        return redirect('purchase/new/' . $invoice_no);

        // Session::forget('purchase_items');
//        $phones = Customer::get(['customer_phone', 'customer_id']);
//        $products = Product::get(['pro_code']);
//        if (Session::has('purchase_items')) {
//            $temp_pro = Session::get('purchase_items');
//            $temp_pro = json_decode(json_encode($temp_pro), false);
//        } else {
//            $temp_pro = 0;
//        }
//
//        return view('admin.buy.index')
//            ->with(compact('products', 'temp_pro', 'phones'));
    }

    public function get_new($invoice_no)
    {

        $invoice = Invoice::where('invoice_no', $invoice_no)->first();
        if (empty($invoice)) {
            $invoice = new Invoice();
            $invoice->invoice_no = $invoice_no;
            $invoice->delivery_charge = 0;
            $invoice->tax = 0;
            $invoice->type = 'purchase';
            $invoice->is_locked = 0;
            $invoice->save();
        }
        session(['invoice_id' => $invoice->id]);
        $products = Product::get(['code', 'title']);
        $temp_pro = TempProduct::with('product')->where('type', 'purchase')->get();
        $invoice = Invoice::find(session('invoice_id'));
        return view('admin.buy.index')
            ->with(compact('products', 'temp_pro','invoice'));
    }

    public function get_product_list()
    {
        $temp_pro = TempProduct::where('type', 'purchase')->get();
        $products = Product::get(['code', 'title']);
        $invoice = Invoice::find(session('invoice_id'));
        return view('admin.common.product_list')
            ->with(compact('products', 'temp_pro', 'invoice'));
    }


    public function get_invoice()
    {
        $customer = Session::get('purchase_customer');
        $customer = json_decode(json_encode($customer), false);
        $products = Session::get('purchase_items');
        $products = json_decode(json_encode($products), false);

        return view('admin.buy.invoice')
            ->with(compact('customer', 'products'));
    }


    public function history()
    {
        return view('admin.buy.history');
    }


    public function post_store(Request $request)
    {
        $input = $request->all();
        unset($input['_token']);
        $customer = Session::get('purchase_customer');
        if ($customer['customer_id'] == '') {
            $customer['customer_id'] = CoreTrait::customerId();
            $customer = Customer::create($customer);
        }
        $input['customer_id'] = $customer['customer_id'];
        $input['invoice_id'] = CoreTrait::PurchaseInvoiceId();
        Sell::create($input);
        $products = Session::get('purchase_items');
        foreach ($products as $key => $p) {
            unset($p['pro_title']);
            $p['invoice_id'] = $input['invoice_id'];
            InvoiceProduct::create($p);
        }
        Session::forget('purchase_customer');
        Session::forget('purchase_items');

        return redirect('buy/view/'.$input['invoice_id'])
            ->with('success', 'Invoice Saved');
    }

    public function post_add_product(Request $request)
    {
        $temp = TempProduct::where('type', 'purchase')
            ->where('invoice_id',session('invoice_id'))
            ->where('product_code', $request->code)->first();
        if (!empty($temp)) {
            $temp->quantity = $temp->quantity + 1;
        } else {
            $temp = new TempProduct();
            $temp->product_code = $request->code;
            $temp->invoice_id = session('invoice_id');
            $temp->quantity = 1;
            $temp->discount = 0;
            $temp->type = 'purchase';
        }

        $temp->save();
    }

    public function get_remove_product($pro_code)
    {
        $product_id = Product::where('code', $pro_code)->pluck('id');
        TempProduct::where('product_id', $product_id)->where('type', 'purchase')->delete();
    }

    public function get_update_product($pro_code, $quantity)
    {
        $temp = TempProduct::where('product_code', $pro_code)->where('type', 'purchase')->first();
        $temp->quantity = $quantity;
        $temp->save();
    }

    public function get_discount_product($pro_code, $discount)
    {
        $temp = TempProduct::where('product_code', $pro_code)->where('type', 'purchase')->first();
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
        $invoice->invoice_date = $request->invoice_date;
        $invoice->is_locked = 1;
        $invoice->type = 'purchase';
        $invoice->save();

        TempProduct::where('invoice_id',$invoice_id)->delete();
        return redirect('purchase-history');

    }
}
