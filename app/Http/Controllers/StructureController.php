<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use Illuminate\Http\Request;

class StructureController extends Controller
{
    //
    function show_structures(){
        return view('structures', ['structures' => Structure::all()]);
    }

    function show_structure($id){
        $structure = Structure::find($id);

        if($structure == null){
            return redirect('structures.show')->withErrors(['structure' => 'Structure introuvable']);
        }

        return view('structure', ['structure' => $structure]);
    }
}
