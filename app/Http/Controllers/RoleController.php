<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_index()
    {
        $roles = Role::get();
        return view('admin.role.index',compact('roles'));
    }

    public function get_create()
    {
        return view('admin.role.create');
    }

    public function post_store(Request $request)
    {
        $role = new Role();
        $role->role = $request->role;
        $role->save();
        return redirect('role');
    }
}
