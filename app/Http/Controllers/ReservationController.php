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

        return view('reserv.reservations', ['reservations' => $reservations]);
    }

    public function show_id($id){
        $reservation = Reservation::findOrFail($id); // return 404 if not found


        return view('reserv.reservation', ['id' => $id, 'reservation' => $reservation]);
    }
}
