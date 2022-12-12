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
            'reservation_periode' => 'require|integer',
            'reservation_commentaire' => 'nullable|string',
            'reservation_statut' => 'required|integer',
        ]);

        $reservation = new \App\Models\Reservation();
        $reservation->utilisateur_id = $request->utilisateur_id;
        $reservation->salle_id = $request->input('salle_id');
        $reservation->date_reservation = $request->input('date_reservation');
        $reservation->date_periode = $request->input('reservation_periode');
        $reservation->reservation_statut = $request->input('reservation_statut');
        $reservation->save();

        return redirect()->route('reservation_show', ['id' => $reservation->id]);
    }

    public function edit(Request $request){
        if($request->getMethod() != 'POST'){
            // return with http error, invalid http method
            return response('Invalid HTTP method', 405);
        }

        $request->validate([
            'utilisateur_id' => 'required|integer',
            'salle_id' => 'required|integer',
            'date_reservation' => 'required|date',
            'reservation_periode' => 'require|integer',
            'reservation_commentaire' => 'nullable|string',
            'reservation_statut' => 'required|integer',
        ]);

        $reservation = \App\Models\Reservation::find($request->id);
        $reservation->utilisateur_id = $request->utilisateur_id;
        $reservation->salle_id = $request->input('salle_id');
        $reservation->date_reservation = $request->input('date_reservation');
        $reservation->date_periode = $request->input('reservation_periode');
        $reservation->reservation_statut = $request->input('reservation_statut');
        $reservation->save();

        return redirect()->route('reservation_show', ['id' => $reservation->id]);
    }

    public function delete(Request $request){
        if($request->getMethod() != 'POST'){
            // return with http error, invalid http method
            return response('Invalid HTTP method', 405);
        }

        $request->validate([
            'reservation_id' => 'required|integer',
        ]);

        $reservation = \App\Models\Reservation::find($request->reservation_id);
        $reservation->delete();

        return redirect()->route('reservation_dashboard');
    }
}
