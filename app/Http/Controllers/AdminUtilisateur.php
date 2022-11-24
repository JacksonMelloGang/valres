<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Administration;

class AdminUtilisateur extends Controller
{
    //

    function show(){
        $user = Administration::all();
        return view('admin.utilisateur', ['users' => $user]);
    }

    function show_id($id){
        $user = Administration::find($id);
        return view('admin.utilisateur', ['user' => $user]);
    }
}
