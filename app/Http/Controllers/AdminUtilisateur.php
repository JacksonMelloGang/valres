<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminUtilisateur extends Controller
{
    //

    function show(){
        return view('admin.utilisateur');
    }

    function show_id($id){
        return view('admin.utilisateur', ['id' => $id]);
    }
}
