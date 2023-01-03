<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSalleFormController extends Controller
{
    //

    function create_salle(Request $request){
        if($request->method() !== 'POST'){
            return redirect()->route('show.salles')->withErrors(['error' => 'Invalid request']);
        }

        $request->validate([
            'salle_nom' => 'required',
            'categorie_id' => 'required|between:1,3',
        ]);

        $salle = new \App\Models\Salle();
        $salle->salle_nom = $request->input('salle_nom');
        $salle->cat_id = $request->input('categorie_id');
        $salle->save();

        return redirect()->route('salles.show')->with('success', 'Salle created');
    }

    function update_salle(Request $request){
        if($request->method() != "POST"){
            return redirect()->route('show.salles')->withErrors(['error' => 'Invalid request method']);
        }

        $request->validate([
            'salle_id' => 'required|integer',
            'salle_nom' => 'required|string',
        ]);

        $salle = \App\Models\Salle::find($request->salle_id);

        if($salle == null){
            return redirect()->route('salles.show')->withErrors(['error' => 'Salle introuvable']);
        }

        $salle->salle_nom = $request->salle_nom;
        $salle->save();

        return redirect()->route('salle.show', ['id' => $salle->salle_id])->with('success', 'Salle updated');
    }


    function delete_salle(Request $request){

        if($request->method() != "POST"){
            return redirect()->route('salles.show')->withErrors(['error' => 'Invalid request method']);
        }

        $request->validate([
            'salle_id' => 'required|integer',
        ]);

        $salle = \App\Models\Salle::find($request->salle_id);


        if($salle == null){
            return redirect()->route('salles.show')->withErrors(['error' => 'Salle introuvable']);
        }

        // check if linked to any reservation
        $reservations = \App\Models\Reservation::where('salle_id', $salle->salle_id)->get();

        // if there is any reservation linked to this salle, we can't delete it
        if(count($reservations) > 0){
            return redirect()->route('salles.show')->withErrors(['error' => 'Salle is linked to a reservation']);
        }

        $salle->delete();

        return redirect()->route('salles.show')->with('success', 'Salle deleted');

    }
}
