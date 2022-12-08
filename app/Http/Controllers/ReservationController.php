<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reservation;

class ReservationController extends Controller
{
    // show views
    public function show(){
        // get all reservations
        $reservations = Reservation::all();

        return view('reservations_show', ['reservations' => $reservations]);
    }

    public function show_id($id){
        $reservation = Reservation::findOrFail($id); // return 404 if not found


        return view('reservation', ['id' => $id, 'reservation' => $reservation]);
    }
}
