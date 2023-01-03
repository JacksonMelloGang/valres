@extends('reservation.layout.layout')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Gestion des réservations</h3>
        </div>
        <div class="card-body">
            <table>
                <thead>

                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                        <tr class="d-flex">
                            <td>{{$reservation->reservation_id}}</td>
                            <td>{{$reservation->utilisateur_id}}</td>
                            <td>{{$reservation->salle_id}}</td>
                            <td>{{$reservation->date}}</td>
                            <td>{{$reservation->reservation_periode}}</td>
                            <td>{{$reservation->reservation_commentaire}}</td>
                            <td>{{$reservation->reservationstatut->libelle}}</td>

                            <td class="align-self-end">
                                <a href="{{url('/reservation/edit/'.$reservation->reservation_id)}}" class="btn btn-primary">Approuver</a>
                            </td>
                            <td class="align-self-end">
                                <a href="{{url('/reservation/edit/'.$reservation->reservation_id)}}" class="btn btn-primary">Annulée</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
