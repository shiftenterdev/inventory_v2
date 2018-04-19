<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 4/19/2018
 * Time: 3:31 PM
 */

namespace App\Http\Controllers;


use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{

    private function code()
    {
        $product_code = Table::orderBy('id', 'desc')->pluck('table_no');
        if (empty($product_code)) {
            $product_code = 'T11';
        } else {
            $product_code = str_replace('T', '', $product_code);
            $product_code = 'T'.(intval($product_code) + 1);
        }

        return $product_code;
    }


    public function index()
    {
        return view('admin.table.index')->with([
            'tables' => Table::get()
        ]);
    }

    public function create()
    {
        return view('admin.table.create');
    }

    public function store(Request $request)
    {
        $request->merge(['table_no'=>$this->code()]);
        Table::create($request->except('_token'));
        return redirect('table');
    }

    public function delete($id)
    {
        Table::destroy($id);
        return redirect()->back();
    }
}