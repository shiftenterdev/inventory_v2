<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceProduct;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\TempProduct;
use App\Repo\CoreTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('access:purchase');
    }

    public function index(Request $request)
    {
        $purchases = Invoice::where('type', 'purchase')
            ->where('status', 1)->get();

        return view('admin.purchase.index')
            ->with(compact('purchases'));
    }

    public function create(Request $request)
    {
        if($request->invoice_no){
            $invoice_no = $request->invoice_no;
            $invoice = Invoice::where('invoice_no', $invoice_no)->first();
            if (empty($invoice)) {
                $invoice = new Invoice();
                $invoice->invoice_no = $invoice_no;
                $invoice->delivery_charge = 0;
                $invoice->tax = 0;
                $invoice->type = 'purchase';
                $invoice->status = 0;
                $invoice->save();
            }
            $invoice = Invoice::where('invoice_no',$request->invoice_no)->first();
            $products = Product::take(15)->get();
            $categories = Category::with('parent')->get();
            $brands = Brand::get(['id', 'title']);
            return view('admin.purchase.create')
                ->with(compact('invoice','products','categories','brands'));
        }else{
            $invoice_no = CoreTrait::PurchaseInvoiceId();
            return redirect('purchase/create?invoice_no='.$invoice_no);
        }
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
        $customer = Session::get('purchase_customer');
        $customer = json_decode(json_encode($customer), false);
        $products = Session::get('purchase_items');
        $products = json_decode(json_encode($products), false);

        return view('admin.purchase.invoice')
            ->with(compact('customer', 'products'));
    }


    public function store(Request $request)
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

    public function update(Request $request)
    {
        switch ($request->type) {
            case 'products':
                $invoice = Invoice::where('invoice_no', $request->invoice_no)->first();
                return view('admin.common.product_list')
                    ->with(compact('products', 'invoice'));
                break;

            case 'add':
                $invoice_product = InvoiceProduct::where('invoice_no', $request->invoice_no)
                    ->where('product_code', $request->code)->first();
                if (!empty($invoice_product)) {
                    $invoice_product->quantity = $invoice_product->quantity + 1;
                } else {
                    $invoice_product = new InvoiceProduct();
                    $invoice_product->product_code = $request->code;
                    $invoice_product->invoice_no = $request->invoice_no;
                    $invoice_product->quantity = 1;
                    $invoice_product->discount = 0;
                    $invoice_product->type = 'purchase';
                    $invoice_product->price = Product::where('code', $request->code)->first()->purchase_price;
                }
                $invoice_product->save();
                break;

            case 'remove':
                InvoiceProduct::where('product_code', $request->code)
                    ->where('invoice_no', $request->invoice_no)
                    ->delete();
                $count = InvoiceProduct::where('invoice_no', $request->invoice_no)->count();
                if ($count == 0) {
                    Invoice::where('invoice_no', $request->invoice_no)->update([
                        'delivery_charge' => 0,
                        'tax'             => 0,
                        'other_discount'    => 0
                    ]);
                }
                break;

            case 'product_discount':
                InvoiceProduct::where('product_code', $request->code)
                    ->where('invoice_no', $request->invoice_no)
                    ->update(['discount' => $request->discount]);
                break;

            case 'price':
                Product::where('code',$request->code)->update(['purchase_price'=>$request->price]);
                InvoiceProduct::where('product_code',$request->code)
                    ->where('invoice_no',$request->invoice_no)
                    ->update(['price'=>$request->price]);

            case 'quantity':
                InvoiceProduct::where('product_code', $request->code)
                    ->where('invoice_no', $request->invoice_no)
                    ->update(['discount' => $request->quantity]);
                break;

            case 'tax':
                Invoice::where('invoice_no', $request->invoice_no)->update(['tax' => $request->tax]);
                break;

            case 'delivery_charge':
                Invoice::where('invoice_no', $request->invoice_no)->update(['delivery_charge' => $request->delivery_charge]);
                break;

            case 'other_discount':
                Invoice::where('invoice_no', $request->invoice_no)->update(['other_discount' => $request->other_discount]);
                break;

            default:
                return 0;
        }
    }

    
}
