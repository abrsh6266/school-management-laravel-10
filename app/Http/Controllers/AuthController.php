<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        if(!empty(Auth::check())){
            return redirect('admin/dashboard');
        }
        return view('auth.login');
    }
    public function authLogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return redirect('admin/dashboard');
        } else {
            return redirect()->back()->with('error', 'Please enter correct email and password!');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect(url('/'));
    }
}
