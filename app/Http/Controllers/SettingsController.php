<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.settings.index');
    }

    public function password(Request $request)
    {
        $input = $request->all();
        if ($input['new_password'] = $input['confirm_password']) {
            $current_pass = User::where('id', Auth::user()->id)
                ->pluck('password');
            if (password_verify($input['new_password'], $current_pass)) {
                User::where('id', Auth::user()->id)->update(['password' => bcrypt($input['new_password'])]);

                return redirect('/settings');
            } else {
                return redirect('/settings');
            }
        } else {
            return redirect('/settings');
        }
    }

    public function store(Request $request)
    {
        $config = new Config();
        $config->where('title','currency')->update(['value'=>$request->currency]);
        return redirect('/settings');
    }
}
