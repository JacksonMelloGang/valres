<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Salle;
use Illuminate\Support\Facades\Request;

class SalleController extends Controller
{

    function salles(Request $request){
        // get all salles with their categorie's libelle
        $salles = Salle::orderBy('salle_id', 'asc')->get();

        return response()->json($salles);
    }


    function salle($id){
        $salle = Salle::where('salle_id', $id)->first();

        // get current date with format 'Y-m-d'
        $date = date('Y-m-d');

        $salle->isAvailable($id, $date, 1);

        return response()->json($salle);
    }

}

