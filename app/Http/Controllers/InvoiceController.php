<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}
