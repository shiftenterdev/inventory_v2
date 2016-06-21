<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_update_password()
    {
        return view('admin.settings.update-password');
    }

    public function post_update_password(Request $request)
    {
        $input = $request->all();
        if ($input['new_password'] = $input['confirm_password']) {
            $current_pass = User::where('id', Auth::user()->id)
                ->pluck('password');
            if (password_verify($input['new_password'], $current_pass)) {
                User::where('id', Auth::user()->id)->update(['password' => bcrypt($input['new_password'])]);

                return redirect('/settings/update-password');
            } else {
                return redirect('/settings/update-password');
            }
        } else {
            return redirect('/settings/update-password');
        }
    }
}
