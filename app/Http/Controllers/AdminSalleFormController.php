<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSalleFormController extends Controller
{
    //

    function create_salle(Request $request){
        if($request->method() !== 'POST'){
            return redirect()->route('show_salles')->withErrors(['error' => 'Invalid request']);
        }

        $request->validate([
            'salle_nom' => 'required',
        ]);

        $salle = new \App\Models\Salle();
        $salle->salle_nom = $request->input('salle_nom');
        $salle->save();

        return redirect()->route('show_salles')->with('success', 'Salle created');
    }

    function edit_salle(Request $request){
        if($request->method() != "POST"){
            return redirect()->route('show_salles')->withErrors(['error' => 'Invalid request method']);
        }

        $request->validate([
            'salle_id' => 'required|integer',
            'salle_nom' => 'required|string',
        ]);

        $salle = \App\Models\Salle::find($request->salle_id);

        if($salle == null){
            return redirect()->route('show_salles')->withErrors(['error' => 'Salle not found']);
        }

        $salle->salle_nom = $request->salle_nom;
        $salle->save();

        return redirect()->route('show_salle_id', ['id' => $salle->salle_id])->with('success', 'Salle updated');
    }

    function delete_salle(Request $request){

        if($request->method() != "POST"){
            return redirect()->route('show_salles')->withErrors(['error' => 'Invalid request method']);
        }

        $request->validate([
            'salle_id' => 'required|integer',
        ]);

        $salle = \App\Models\Salle::find($request->salle_id);

        if($salle == null){
            return redirect()->route('show_salles')->withErrors(['error' => 'Salle not found']);
        }

        $salle->delete();

        return redirect()->route('show_salles')->with('success', 'Salle deleted');

    }
}
