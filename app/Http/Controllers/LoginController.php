<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    function show(){
        return view('login', [
            "title" => "Login"
        ]);
    }

    function attempt_login(Request $request){
        // validate request otherwise return to login page with error message
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);


        // attempt to login with username and password
        $credentials = $request->only('username', 'password');

        if(Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])){
            $request->session()->regenerate();

            return redirect()->intended('home');
        }




        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');

    }
}