<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('access:user');
    }

    public function index()
    {
        $users = User::with('roles')->get();

        return view('admin.user.index')
            ->with(compact('users'));
    }

    public function create()
    {
        $roles = Role::get();
        return view('admin.user.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->password = bcrypt($request->password);
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->save();

        $user->roles()->sync([$request->role_id]);

        return redirect('/user')
            ->with('success', 'User Created Successfully');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::get();

        return view('admin.user.edit')
        ->with(compact('user','roles'));
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->save();

        $user->roles()->sync([$request->role_id]);

        return redirect('/user')
            ->with('success', 'User Updated');
    }

    public function delete($id)
    {
        User::destroy($id);

        return redirect('/user')
            ->with('success', 'User Deleted');
    }
}
