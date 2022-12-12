<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reservation;

class ReservationController extends Controller
{


    public function index(){

        // get informations about reservations like latest reservation...
        $reservations = Reservation::all();
        $your_latest_reservation = Reservation::where('utilisateur_id', auth()->user()->utilisateur_id)->latest()->first();
        $your_reservations = Reservation::where('utilisateur_id', auth()->user()->utilisateur_id)->get();
        $title = "Dashboard";


        return view('reservation.home', ['reservations' => $reservations, 'user_latest_reservation' => $your_latest_reservation, 'title' => $title]);
    }

    // show views
    public function show_reservations(){
        // get all reservations
        $reservations = Reservation::all();

        return view('reservation.reservation.reservations', ['reservations' => $reservations]);
    }

    public function show_reservation($id){
        $reservation = Reservation::find($id);

        if($reservation == null){
            return redirect()->route('reservation_dashboard')->withErrors(['error' => 'Reservation not found']);
        }


        return view('reservation.reservation.reservation', ['id' => $id, 'reservation' => $reservation]);
    }
}
