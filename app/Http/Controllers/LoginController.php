<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    function show(){

        // if user already logged
        if(Auth::check()){
            return redirect()->intended('/dashboard');
        }

        return view('login', [
            "title" => "Login"
        ]);
    }

    function attempt_login(Request $request){
        // validate request otherwise return to login page with error message
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'remember' => 'boolean'
        ]);

        // check if remember me is checked
        $remember = $request->remember ? true : false;

        // attempt to log in with username and password
        $credentials = $request->only('username', 'password');

        if(Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password'], 'is_banned' => 0], $remember)){
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }


        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');

    }

    function logout(){
        Auth::logout();

        return redirect()->intended('login');
    }
}
