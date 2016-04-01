<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SettingsController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_update_password(Request $request)
    {
	$current_pass = User::where('id',Auth::user()->id)
		->pluck('password');
	if(password_verify()){

	}else{

	}
    }

    public function post_update_password()
    {

    }

}
