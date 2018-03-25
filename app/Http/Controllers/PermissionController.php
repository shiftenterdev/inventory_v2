<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 3/25/2018
 * Time: 9:37 PM
 */

namespace App\Http\Controllers;


use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::get();
        return view('admin.permission.index')->with(compact('permissions'));
    }

    public function create()
    {
        return view('admin.permission.create');
    }

    public function store(Request $request)
    {
        Permission::create([
            'title'=>$request->title,
            'slug'=>$request->slug
        ]);
        return redirect('permission');
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('admin.permission.edit')->with(compact('permission'));
    }

    public function update(Request $request,$id)
    {
        Permission::find($id)->fill([
            'title'=>$request->title,
            'slug'=>$request->slug
        ])->save();
        return redirect('permission');
    }

    public function delete($id)
    {
        Permission::destroy($id);
        return redirect('permission');
    }
}