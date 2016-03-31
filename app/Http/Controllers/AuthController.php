<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
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
            'user_email' => $request->email,
            'password' => $request->password
        ];
//        dd($credential);

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
