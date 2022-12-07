<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reservation;

class ReservationController extends Controller
{
    //

    public function show(){
        // get all reservations
        $reservations = Reservation::all();

        return view('reservations_show');
    }

    public function show_id($id){
        $reservation = Reservation::findOrFail($id); // return 404 if not found


        return view('reservation', ['id' => $id, 'reservation' => $reservation]);
    }

    public function create(Request $request){
        //return view('reservations_create');
    }

    public function create_form(Request $request){
        $allParameters = $request->input();

        dd($allParameters);
    }

    public function edit($id){
        return view('reservations_edit', ['id' => $id]);
    }

    public function delete($id){
        return view('reservations_delete', ['id' => $id]);
    }
}
