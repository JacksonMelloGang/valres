<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUtilisateurController extends Controller
{
    //

    function show(){
        $users = User::all();
        return view('admin.utilisateurs', ['users' => $users]);
    }

    function show_id($id){
        $user = User::find($id);
        return view('admin.utilisateur', ['user' => $user]);
    }
}
