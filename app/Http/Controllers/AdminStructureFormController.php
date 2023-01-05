<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminStructureFormController extends Controller
{
    //
    function create(Request $request){
        // check if method is post method
        if($request->method() != 'POST'){
            return response('Invalid HTTP method', 405);
        }

        // validate request data
        $request->validate([
            'nom' => 'required|string',
            'adresse' => 'required|string',
            'categorie' => 'required|integer',
        ]);

        // create new structure
        $structure = new \App\Models\Structure();
        $structure->structure_nom = $request->structure_nom;
        $structure->structure_adresse = $request->structure_adresse;
        $structure->categorie_structure_id = $request->categorie;
        $structure->save();

        // redirect to structure manage page
        return redirect()->route('structure.show', ['id' => $structure->structure_id])->with('success', 'Structure créée avec succès');
    }

    function delete(Request $request){
        // check if method is post method
        if($request->method() != 'POST'){
            return response('Invalid HTTP method', 405);
        }

        // validate request data
        $request->validate([
            'structure_id' => 'required|integer',
        ]);

        // delete structure
        $structure = \App\Models\Structure::find($request->structure_id);
        // structure not found
        if($structure != null){
            return redirect()->route('structures.show')->with('error', 'Structure introuvable');
        }

        $structure->delete();

        // redirect to structure manage page
        return redirect()->route('structures.show')->with('success', 'Structure supprimée avec succès');
    }
}
