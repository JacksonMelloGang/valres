<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class APITokenController extends Controller
{
    public function token(Request $request){

        if($request->method() != 'POST'){
            return response()->json('Invalid HTTP method', 405);
        }

        $validated = $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);

        $login = $validated['login'];
        $password = $validated['password'];

        // attempt to find user with login, and then check password
        $user = User::all()->where('username', $login)->first();


        if($user == null){
            return response()->json(['error' => 'Invalid credentials', 'code' => "0"], 204);
        }

        if(!Hash::check($password, $user->password)){
            return response()->json(['error' => 'Invalid credentials', 'code' => "0"], 204);
        }

        $token = null;

        if(!$user->hasToken()){
            $token = $user->generateToken();
        } else {
            $token = $user->getToken();
        }

        return response()->json(['token' => $token, 'code' => "1"]);
    }
}
