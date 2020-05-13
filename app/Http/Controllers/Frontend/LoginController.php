<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Hash;

class LoginController extends Controller
{
    const DASHBOARD_URL = '/';

    public function index(){
        if (Auth::check()) {
            return redirect(self::DASHBOARD_URL);
        }
        $user =new User();
    	return view('users.elements.login');
    }
    public function postLogin(Request $request){
    	$credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect(self::DASHBOARD_URL);
    	}else {
            return redirect()->back()->with('alert','Wrong password or email');
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect('/');
    }
}
