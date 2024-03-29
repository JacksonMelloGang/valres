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
        ]);

        // attempt to log in with username and password
        $credentials = $request->only('username', 'password');


        // attempt to log in
        if(Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password'], 'is_banned' => 0])){
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'error' => 'Mauvais Identifiant / Mot de passe ou bien votre compte a été banni.',
        ]);

    }

    function logout(){
        Auth::logout();

        return redirect()->intended('login');
    }
}
