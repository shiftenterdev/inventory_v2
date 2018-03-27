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
        return view('admin.payment.create',compact('products'));
    }

    public function post_save(Request $request)
    {

    }
}
