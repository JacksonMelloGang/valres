<?php

namespace App\Http\Controllers;

use App\Models\Categorie_structure;
use Illuminate\Http\Request;

class AdminStructureController extends Controller
{
    //
    function create_structure(){

        $categories = Categorie_structure::all();

        return view('admin.structurecreate', ['categories' => $categories]);
    }


}
