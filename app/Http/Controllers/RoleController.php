<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('admin.role.index',compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::get();
        return view('admin.role.create')->with(compact('permissions'));
    }

    public function store(Request $request)
    {
        $role = new Role();
        $role->title = $request->title;
        $role->slug = $request->slug;
        $role->save();

        $role->permissions()->sync($request->permission_id);

        return redirect('role');
    }

    public function edit($id)
    {
        $permissions = Permission::get();
        $role = Role::with('permissions')->find($id);
        return view('admin.role.edit')->with(compact('role','permissions'));
    }

    public function update(Request $request,$id)
    {
        $role = Role::find($id);
        $role->title = $request->title;
        $role->slug = $request->slug;
        $role->save();
        $role->permissions()->sync($request->permission_id);
        return redirect('role');
    }
}
