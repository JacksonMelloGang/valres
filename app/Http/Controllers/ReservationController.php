<?php

namespace App\Http\Controllers;

use App\Models\Categorie_salle;
use App\Models\ReservationPeriode;
use App\Models\ReservationStatut;
use App\Models\Salle;
use App\Models\Structure;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index(){

        // get informations about reservations like latest reservation...
        if(Auth::user()->isAdministrateur() || Auth::user()->isSecretaire()){
            $reservations = Reservation::all();
        } else {
            $reservations = Reservation::where('utilisateur_id', Auth::user()->utilisateur_id)->get();
        }

        $your_latest_reservation = Reservation::where('utilisateur_id', auth()->user()->utilisateur_id)->latest()->first();
        $your_reservations = Reservation::where('utilisateur_id', auth()->user()->utilisateur_id)->get();
        $title = "Dashboard";

        return view('reservation.home', ['reservations' => $reservations, 'user_latest_reservation' => $your_latest_reservation, 'title' => $title]);
    }

    // show views
    public function show_reservations(Request $request){

        // get all reservations & salles
        $categories_salles = Categorie_salle::all();
        $salles = Salle::all();

        // get all date
        $date = $request->get('date') ?? date('Y-m-d 00:00:00');

        // temporarly convert date to carbon object, to get the week from a day
        $date = Carbon::parse($date);
        $start_date = $date->startOfWeek()->format('Y-m-d 00:00:00');
        $end_date = $date->endOfWeek()->format('Y-m-d 23:59:59');

        $reservations = Reservation::whereBetween('date_reservation', [$start_date, $end_date])->get();


        // get periodes from reservation_periode table and insert into array
        $periodes = [];
        foreach(ReservationPeriode::all() as $periode){
            $periodes[$periode->id_rsperiode] = $periode->libelle;
        }

        $date = date('Y-m-d 00:00:00');
        // return view
        return view('reservation.reservation.reservations', ['reservations' => $reservations, 'categories_salles' => $categories_salles, 'salles' => $salles, 'date' => $date, 'periodes' => $periodes]);
    }

    function search(){
        $cardtitle = "Rechercher des réservations";
        $structures = Structure::all();
        $searched = false;

        return view('reservation.reservation.search', ['cardtitle' => $cardtitle, 'structures' => $structures, 'searched' => $searched]);
    }

    public function today_reservation(){
        // get all reservations
        $categories_salles = Categorie_salle::all();

        // current datetime
        $current_date = date('Y-m-d 00:00:00');

        // get reservations for today
        $reservations = Reservation::where('date_reservation', $current_date)->where('reservation_statut', '=', '1')->get();

        // SELECT * FROM salle WHERE salle_id IN (SELECT salle_id FROM reservation WHERE date_reservation = $current_date) TODO: check if this is correct
        $salles = Salle::all();

        return view('reservation.reservation.today', ['salles' => $salles, 'reservations' => $reservations, 'categories_salles' => $categories_salles]);
    }

    public function show_reservation($id){
        $reservation = Reservation::find($id);

        // reservation not found
        if($reservation == null){
            return redirect()->route('reservation.dashboard')->withErrors(['error' => 'Reservation introuvable']);
        }

        return view('reservation.reservation.reservation', ['reservation' => $reservation]);
    }

    // validate or cancel reservation
    function manage_reservation(){
        // get reservations order by date desc & reservation_statut
        $reservations = Reservation::orderBy('date_reservation', 'desc')->orderBy('reservation_periode', 'desc')->get();
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

    function create_reservation(Request $request){
        $reservation_statuts = ReservationStatut::all();
        $reservations_periodes = ReservationPeriode::all();
        $utilisateurs = User::all();
        $salles = Salle::all();

        // get periode & salle id from url, if not found, set it values to null
        $salle_id = $request->get('salle') ?? null;
        $periode = $request->get('period') ?? null;

        return view('reservation.reservation.create', ['reservation_statuts' => $reservation_statuts, 'reservations_periodes' => $reservations_periodes, 'utilisateurs' => $utilisateurs, 'salles' => $salles, 'salle_id' => $salle_id, 'periode' => $periode]);
    }
}
