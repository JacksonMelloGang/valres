<?php

namespace App\Http\Controllers;

use App\Models\Categorie_salle;
use App\Models\ReservationStatut;
use App\Models\Salle;
use App\Models\User;
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
        $categories_salles = Categorie_salle::all();


        return view('reservation.reservation.reservations', ['reservations' => $reservations]);
    }

    public function today_reservation(){
        // get all reservations
        $categories_salles = Categorie_salle::all();

        // current datetime
        $current_date = date('Y-m-d 00:00:00');

        // get reservations for today
        $reservations = Reservation::where('date_reservation', $current_date)->where('reservation_statut', '=', '1')->get();

        // SELECT * FROM salle WHERE salle_id IN (SELECT salle_id FROM reservation WHERE date_reservation = $current_date)
        $salles = Salle::all();

        return view('reservation.reservation.today', ['salles' => $salles, 'reservations' => $reservations, 'categories_salles' => $categories_salles]);
    }

    public function show_reservation($id){
        $reservation = Reservation::find($id);

        if($reservation == null){
            return redirect()->route('reservation.dashboard')->withErrors(['error' => 'Reservation introuvable']);
        }


        return view('reservation.reservation.reservation', ['reservation' => $reservation]);
    }

    // validate or cancel reservation
    function manage_reservation(){
        $reservations = Reservation::all();
        $reservation_statuts = ReservationStatut::all();

        return view('reservation.reservation.manage', ['reservations' => $reservations, 'reservation_statuts' => $reservation_statuts]);
    }

    function edit($id){
        $reservation = Reservation::find($id);
        $reservation_statuts = ReservationStatut::all();
        $utilisateurs = User::all();
        $salles = Salle::all();

        return view('reservation.reservation.edit', ['reservation' => $reservation, 'reservation_statuts' => $reservation_statuts, 'utilisateurs' => $utilisateurs, 'salles' => $salles]);
    }

    function delete($id){
        $reservation = Reservation::find($id);

        if($reservation == null){
            return redirect()->route('reservation.dashboard')->withErrors(['error' => 'Reservation introuvable']);
        }

        $reservation->delete();

        return redirect()->route('reservation.dashboard')->with('success', 'Réservation supprimé avec succès');
    }

    function create_reservation(){
        $reservation_statuts = ReservationStatut::all();
        $utilisateurs = User::all();
        $salles = Salle::all();

        return view('reservation.reservation.create', ['reservation_statuts' => $reservation_statuts, 'utilisateurs' => $utilisateurs, 'salles' => $salles]);
    }
}
