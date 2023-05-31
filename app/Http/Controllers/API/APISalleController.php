<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Categorie_salle;
use App\Models\Salle;
use Illuminate\Support\Facades\Request;

class APISalleController extends Controller
{

    function salles(){
        // get all salles with their categorie's libelle
        $salles = Salle::orderBy('salle_id', 'asc')->get();

        return response()->json($salles);
    }

    function salle(Request $request, $id){
        $salle = Salle::where('salle_id', $id)->first();

        // get current date with format 'Y-m-d'
        $date = date('Y-m-d');
        $reservationperiode = $request->input('reservation_periode') ?? 1;

        $available = $salle->isAvailable($id, $date, $reservationperiode);

        $category = Categorie_salle::where('cat_id', $salle->cat_id)->first();

        return response()->json(['salle' => $salle, 'category' => $category, 'available' => $available]);
    }

}

