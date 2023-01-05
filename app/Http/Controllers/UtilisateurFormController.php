<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UtilisateurFormController extends Controller
{
    //
    public function update_profile(Request $request){
        if($request->method() != 'POST'){
            // return with http error, invalid http method
            return response('Invalid HTTP method', 405);
        }

        // validate request
        $request->validate([
           'mdp' => 'required|string|min:8',
           'mail' => 'required|email',
        ]);

        // get mdp & mail from request
        $mdp = $request->input('mdp');
        $mail = $request->input('mail');

        // get user from session
        $user = Auth::user();

        // update user
        $user->password = Hash::make($mdp);
        $user->mail = $mail;

        // save user
        $user->save();

        // redirect to profile
        return redirect()->route('user.profile')->with('success', 'Profil mis à jour');
    }
}
