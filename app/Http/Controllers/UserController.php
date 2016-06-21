<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_index()
    {
        $users = User::all();

        return view('admin.user.index')
            ->with(compact('users'));
    }

    public function get_create()
    {
        return view('admin.user.create');
    }

    public function post_store(Request $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt('demo');
        unset($input['_token']);
        User::create($input);

        return redirect('/user')
            ->with('success', 'User Created Successfully');
    }

    public function get_edit($id)
    {
        $user = User::find($id);

        return view('admin.user.edit')
        ->with(compact('user'));
    }

    public function post_update($id, Request $request)
    {
        $input = $request->all();
        unset($input['_token']);
        User::where('id', $id)->update($input);

        return redirect('/user')
            ->with('success', 'User Updated');
    }

    public function get_delete($id)
    {
        User::destroy($id);

        return redirect('/user')
            ->with('success', 'User Deleted');
    }
}
