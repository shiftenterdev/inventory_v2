<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function get_index()
    {
        return view('auth.login');
    }

    public function post_index(Request $request)
    {
        $credential = [
            'email'    => $request->email,
            'password' => $request->password,
//            'status'   => 1
        ];
        if (Auth::attempt($credential)) {
            return redirect('/');
        } else {
            return redirect('/auth');
        }
    }

    public function get_logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('/');
    }
}
