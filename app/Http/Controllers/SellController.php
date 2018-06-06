<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceCustomer;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Sell;
use App\Models\InvoiceProduct;
use App\Models\TempProduct;
use App\Repo\CoreTrait;
use Barryvdh\DomPDF\Facade as PDF;
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
        $sells = Invoice::where('type', 'sell')
            ->where('status', 1)->get();

        return view('admin.sell.index')
            ->with(compact('sells'));
    }

    public function create(Request $request)
    {
        if ($request->invoice_no) {
            $invoice_no = $request->invoice_no;
            $invoice = Invoice::where('invoice_no', $invoice_no)->first();
            if (empty($invoice)) {
                $invoice = new Invoice();
                $invoice->invoice_no = $invoice_no;
                $invoice->other_discount = 0;
                $invoice->delivery_charge = 0;
                $invoice->tax = 0;
                $invoice->type = 'sell';
                $invoice->status = 0;
                $invoice->save();
            }
            $invoice = Invoice::where('invoice_no', $request->invoice_no)->first();
            $products = Product::take(15)->get();
            return view('admin.sell.create')
                ->with(compact('invoice', 'products'));
        } else {
            $invoice_no = CoreTrait::SellInvoiceId();
            return redirect('sell/create?invoice_no=' . $invoice_no);
        }
    }

    public function show($invoice_no)
    {
        $invoice = Invoice::where('invoice_no', $invoice_no)
            ->first();
        return view('admin.sell.show', compact('invoice'));
    }

    public function pdf($invoice_no)
    {
        $invoice = Invoice::where('invoice_no', $invoice_no)
            ->first();
//        return view('admin.sell.print',compact('invoice'));
        $pdf = PDF::loadView('admin.sell.print', compact('invoice'));
        return $pdf->stream();
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
                    $invoice_product->type = 'sell';
                    $invoice_product->price = Product::where('code', $request->code)->first()->sell_price;
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
                        'other_discount'  => 0
                    ]);
                }
                break;

            case 'product_discount':
                InvoiceProduct::where('product_code', $request->code)
                    ->where('invoice_no', $request->invoice_no)
                    ->update(['discount' => $request->discount]);
                break;

            case 'quantity':
                InvoiceProduct::where('product_code', $request->code)
                    ->where('invoice_no', $request->invoice_no)
                    ->update(['quantity' => $request->quantity]);
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
        $input = $request->except('_token');
        $invoice = Invoice::where('invoice_no', $request->invoice_no)->first();
        $invoice->update([
            'status'       => 1,
            'invoice_sl'   => $request->invoice_sl,
            'invoice_date' => $request->invoice_date,
            'total_amount' => $invoice->total_amount
        ]);

        $customer = Customer::where('mobile', $request->mobile)->orWhere('email', $request->email)->first();
        if (empty($customer)) {
            $customer = Customer::create([
                'customer_no' => CoreTrait::customerId(),
                'name'        => $request->name,
                'email'       => $request->email,
                'mobile'      => $request->mobile,
                'address'     => $request->address,
                'balance'     => 0.00,
                'status'      => 1
            ]);
        }

        $invoice->customers()->sync([$customer->id]);

        return redirect('sell/show/' . $input['invoice_no'])
            ->with('success', 'Invoice Saved');
    }


    public function get_view($sell_id)
    {
        $result = Sell::with('customer', 'products')->where('invoice_id', $sell_id)->first();
        return view('admin.sell.view')
            ->with(compact('result'));
    }

    
}
