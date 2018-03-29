<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 3/29/2018
 * Time: 6:10 PM
 */

namespace App\Http\Controllers;


use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees  = Employee::get();
        return view('admin.employee.index')->with(compact('employees'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        Employee::create([
            'name'=>$request->name,
            'designation'=>$request->designation,
            'status'=>$request->status,
            'date_of_join'=>$request->date_of_join
        ]);
        return redirect()->back();
    }

    public function delete(Request $request,$id)
    {

    }
}