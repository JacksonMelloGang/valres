<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationControllerForm extends Controller
{
    public function search(Request $request){
        $reservations = [];

        // check if http method is POST
        if($request->method() != 'POST'){
            return redirect()->route('reservation.search');
        }

        // get request data
        $structureid = $request->input('structure_id');

        // get all reservations a structure has done, but first get the structure
        $structure = Structure::findOrFail($structureid);

        foreach($structure->clients as $client){
            foreach($client->user->reservations as $reservation){
                $reservations[] = $reservation;
            }
        }

        return view('reservation.reservation.search', [
            'cardtitle' => 'Réservations de la structure : ' . $structure->structure_nom,
            'structures' => Structure::all(),
            'searched' => true,

            'structure' => $structure,
            'reservations' => $reservations
        ]);
    }

    //
    public function create(Request $request){
        if($request->method() != 'POST'){
            // return with http error, invalid http method
            return response('Invalid HTTP method', 405);
        }

        $request->validate([
            'utilisateur_id' => 'required|integer',
            'salle_id' => 'required|integer',
            'date_reservation' => 'required|date',
            'reservation_periode' => 'required|integer',
            'reservation_commentaire' => 'nullable|string',
            'reservation_statut' => 'required|integer',
        ]);

        // check if there isn't already a reservation for this salle at this date & period
        $reservation = \App\Models\Reservation::where('salle_id', $request->salle_id)
            ->where('date_reservation', $request->date_reservation)
            ->where('reservation_periode', $request->reservation_periode)
            ->first();

        if($reservation){
            return response('Reservation already exists', 409);
        }


        // verify if the user is allowed to make a reservation with statut Confirmée / Annulée
        if($request->input('reservation_statut') != 2){
            $user = User::find($request->utilisateur_id);
            if($user == null){
                return response('User not found', 404);
            }

            if(!$user->isAdministrateur() || !$user->isSecretaire()){
                return response('User is not an administrator or a secretary', 403);
            }
        }

        $reservation = new \App\Models\Reservation();
        $reservation->utilisateur_id = $request->utilisateur_id;
        $reservation->salle_id = $request->input('salle_id');
        $reservation->date_reservation = $request->input('date_reservation');
        $reservation->reservation_periode = $request->input('reservation_periode');
        $reservation->reservation_commentaire = $request->input('reservation_commentaire');
        $reservation->reservation_statut = $request->input('reservation_statut');
        $reservation->save();

        return redirect()->route('reservation.show', ['id' => $reservation->reservation_id]);
    }

    public function edit(Request $request){
        if($request->getMethod() != 'POST'){
            // return with http error, invalid http method
            return response('Invalid HTTP method', 405);
        }

        $request->validate([
            'reservation_id' => 'required|integer',
            'utilisateur_id' => 'required|integer',
            'salle_id' => 'required|integer',
            'date_reservation' => 'required|date',
            'reservation_periode' => 'required|integer',
            'reservation_commentaire' => 'nullable|string',
            'reservation_statut' => 'required|integer',
        ]);

        $reservation = \App\Models\Reservation::find($request->reservation_id);

        if($reservation == null){
            return redirect()->route('reservation.dashboard')->withErrors(['error' => 'Reservation introuvable']);
        }

        $reservation->utilisateur_id = $request->input('utilisateur_id');
        $reservation->salle_id = $request->input('salle_id');
        $reservation->date_reservation = $request->input('date_reservation');
        $reservation->reservation_periode = $request->input('reservation_periode');
        $reservation->reservation_statut = $request->input('reservation_statut');
        $reservation->save();

        return redirect()->route('reservation.edit', ['id' => $reservation->reservation_id])->with('success', 'La réservation a bien été mis à jour');
    }

    public function delete(Request $request){
        if($request->getMethod() != 'POST'){
            // return with http error, invalid http method
            return response('Invalid HTTP method', 405);
        }

        $request->validate([
            'reservation_id' => 'required|int',
        ]);

        $reservation = \App\Models\Reservation::find($request->reservation_id);
        $reservation->delete();

        return redirect()->route('reservation.manage')->with('success', 'La réservation a bien été supprimée');
    }

    public function approve_reservation(Request $request){
        // check if method is post method
        if($request->getMethod() != 'POST'){
            // return with http error, invalid http method
            return response('Invalid HTTP method', 405);
        }

        // find reservation or throw 404
        $reservation = \App\Models\Reservation::findOrFail($request->reservation_id);
        $reservation->reservation_statut = 1;
        $reservation->save();

        return redirect()->route('reservation.manage')->with('success', 'La réservation a bien été approuvée');
    }

    public function reject_reservation(Request $request){
        // check if method is post method
        if($request->getMethod() != 'POST'){
            // return with http error, invalid http method
            return response('Invalid HTTP method', 405);
        }

        // find reservation or throw 404
        $reservation = \App\Models\Reservation::findOrFail($request->reservation_id);
        $reservation->reservation_statut = 3;
        $reservation->save();

        return redirect()->route('reservation.manage')->with('success', 'La réservation a bien été refusée');
    }

    public function get_reservation(Request $request){

        $request->validate([
            'date' => 'required|date:Y-m-d',
        ]);

        $date = $request->input('date');

        $reservations = \App\Models\Reservation::whereBetween('date_reservation', ["$date 00:00:00", "$date 23:59:00"])->get();

        return response()->json($reservations);
    }
}
