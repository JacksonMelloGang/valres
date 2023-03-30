<?php

namespace App\Http\Controllers;

use App\Models\Categorie_salle;
use App\Models\Reservation;
use App\Models\Salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    //
    function show_salles(){
        $salles = Salle::orderBy('salle_id', 'asc')->get();

        return view('salles', ['salles' => $salles]);
    }

    function show_salle($id){
        $salle = Salle::find($id);

        if($salle == null){
            return redirect()->back()->withErrors(['Salle introuvable']);
        }

        $reservations = Reservation::where('salle_id', $id)->get();

        return view('salle', ['salle' => $salle, 'reservations' => $reservations]);
    }

    function edit_salle($id){
        $salle = Salle::find($id);
        $categories = Categorie_salle::all();

        if($salle == null){
            return redirect()->back()->withErrors(['Salle introuvable']);
        }

        return view('admin.salle.edit', ['salle' => $salle, 'categories' => $categories]);
    }

    function create_salle(){
        $categories = Categorie_salle::all();

        return view('admin.salle.create', ['categories' => $categories]);
    }


    function api_salles(){
        $salles = Salle::orderBy('salle_id', 'asc')->get();

        return response()->json($salles);
    }

}
