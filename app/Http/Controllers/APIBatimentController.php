<?php

namespace App\Http\Controllers;

use App\Models\Batiment;
use App\Models\Salle;
use Illuminate\Http\Request;

class APIBatimentController extends Controller
{
    function batiments(){
        // get list of buildings
        $batiments = Batiment::orderBy('name', 'asc')->get();
        
        return response()->json(['batiments' => $batiments]);
    }

    function salles_batiment(Request $request, $id){
        // get all salles with their categorie's libelle
        $salles = Salle::where('batimentId', $id)->orderBy('salle_id', 'asc')->get();

        return response()->json(['salles' => $salles]);
    }

    function batiment(Request $request, $id){
        $batiment = Batiment::where('name', $id)->first();

        //get salles of the building
        $salles = Salle::where('batimentId', $batiment->name)->get();


        return response()->json([$salles]);
    }
}
