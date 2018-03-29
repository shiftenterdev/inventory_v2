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
        $this->middleware('access:sell');
    }

    public function index(Request $request)
    {
        if($request->invoice){
            $invoice_no = $request->invoice;
            $invoice = Invoice::where('invoice_no', $invoice_no)->first();
            if (empty($invoice)) {
                $invoice = new Invoice();
                $invoice->invoice_no = $invoice_no;
                $invoice->other_discount = 0;
                $invoice->delivery_charge = 0;
                $invoice->tax = 0;
                $invoice->type = 'sell';
                $invoice->is_locked = 0;
                $invoice->save();
            }
            session(['invoice_no' => $invoice_no]);
            $products = Product::get(['code', 'title']);
            $invoice = Invoice::where('invoice_no',\session('invoice_no'))->first();
            return view('admin.sell.index')
                ->with(compact('products', 'temp_pro','invoice'));
        }else{
            $invoice_no = CoreTrait::SellInvoiceId();
            return redirect('sell?invoice='.$invoice_no);
        }
    }

    public function show($invoice_no)
    {
        $invoice = Invoice::with('details.product','customer')
            ->where('invoice_no',$invoice_no)
            ->first();
        return view('admin.sell.invoice',compact('invoice'));
    }


    public function products()
    {
        $products = Product::get(['code', 'title']);
        $invoice = Invoice::where('invoice_no',\session('invoice_no'))->first();
        return view('admin.common.product_list')
            ->with(compact('products', 'invoice'));
    }

    public function invoice()
    {
        $customer = Session::get('sell_customer');
        $customer = json_decode(json_encode($customer), false);
        $products = TempProduct::with('product')->get();


        return view('admin.sell.invoice')
            ->with(compact('customer', 'products'));
    }

    public function store(Request $request)
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


    public function history()
    {
        $sells = Invoice::where('type','sell')
            ->where('is_locked',1)
            ->with('customer','details')->get();
        return view('admin.sell.history')
            ->with(compact('sells'));
    }

    public function get_view($sell_id)
    {
        $result = Sell::with('customer', 'products')->where('invoice_id', $sell_id)->first();
        return view('admin.sell.view')
            ->with(compact('result'));
    }


    public function add_product(Request $request)
    {
        $products = InvoiceProduct::where('invoice_no',session('invoice_no'))
            ->where('product_code', $request->code)->first();
        if (!empty($products)) {
            $products->quantity = $products->quantity + 1;
        } else {
            $products = new InvoiceProduct();
            $products->product_code= $request->code;
            $products->invoice_no = session('invoice_no');
            $products->quantity = 1;
            $products->discount = 0;
            $products->type = 'sell';
        }

        $products->save();
    }

    public function remove_product($pro_code)
    {
        InvoiceProduct::where('product_code', $pro_code)->where('type', 'sell')->delete();
    }

    public function update_product($pro_code, $quantity)
    {
        InvoiceProduct::where('product_code', $pro_code)->where('type', 'sell')->update(['quantity'=>$quantity]);
    }

    public function discount($pro_code, $discount)
    {
        InvoiceProduct::where('product_code', $pro_code)->where('type', 'sell')->update(['discount'=>$discount]);
    }

    public function tax($tax)
    {
        $invoice = Invoice::where('invoice_no',\session('invoice_no'))->first();
        $invoice->tax = $tax;
        $invoice->save();
    }

    public function charge($charge)
    {
        $invoice = Invoice::where('invoice_no',\session('invoice_no'))->first();
        $invoice->delivery_charge = $charge;
        $invoice->save();
    }

    public function other_discount($charge)
    {
        $invoice = Invoice::where('invoice_no',\session('invoice_no'))->first();
        $invoice->other_discount = $charge;
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
        $invoice->type = 'sell';
        $invoice->save();

        TempProduct::where('invoice_id',$invoice_id)->delete();
        return redirect('sells-history');

    }
}
