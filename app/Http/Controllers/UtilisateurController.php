<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    //
    function show_profile(){
        $user = auth()->user();

        return view('profile', ['user' => $user]);
    }

}
