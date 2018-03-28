<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::get();
        return view('admin.payment.index', compact('payments'));
    }

    public function create()
    {
        $products = Product::get();
        return view('admin.payment.create', compact('products'));
    }

    public function store(Request $request)
    {
        Payment::create([
            'invoice_no' => $request->invoice_no,
            'amount'     => $request->amount,
            'method'     => $request->payment_method,
            'trx_id'     => $request->trx_id,
            'info'       => $request->info
        ]);
        return redirect()->back();
    }

    public function delete($id)
    {
        Payment::destroy($id);
        return redirect()->back();
    }
}
