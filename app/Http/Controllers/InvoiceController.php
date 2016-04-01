<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class InvoiceController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

}
