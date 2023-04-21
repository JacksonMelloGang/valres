<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Salle;

class APICodeController extends Controller
{
    //
    public function index(Request $request){
        $request->validate([
            'salle_id' => 'required|integer',
            'year' => 'required|integer',
            'month' => 'required|integer'
        ]);


        $salle = Salle::findOrFail($request->input('salle_id'));
        $code = $salle->salle_code($request->input('year'), $request->input('month'));
        
        return response()->json(["code" => $code]);
    }
}
