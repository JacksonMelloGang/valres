<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationControllerForm extends Controller
{
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
            return redirect()->route('reservation.dashboard')->withErrors(['error' => 'Reservation not found']);
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

        return redirect()->route('reservation.dashboard');
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
