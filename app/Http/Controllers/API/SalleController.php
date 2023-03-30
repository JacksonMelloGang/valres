<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Salle;

class SalleController extends Controller
{

    function salles(){
        $salles = Salle::orderBy('salle_id', 'asc')->get();

        return response()->json($salles);
    }

}
