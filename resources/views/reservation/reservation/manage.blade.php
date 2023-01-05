@extends('reservation.layout.layout')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Gestion des réservations</h3>
        </div>
        <div class="card-body text-center">
            <table class="table table-striped table-secondary">
                <thead>
                    <tr>
                        <th>Numero</th>
                        <th>Nom & Prenom</th>
                        <th>Nom de salle</th>
                        <th>Date</th>
                        <th>Periode</th>
                        <th>Commentaire</th>
                        <th>Statut</th>

                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                        <tr class="" scope='row'>
                            <td>{{$reservation->reservation_id}}</td>
                            <td><a href='{{url('admin/user/' . $reservation->utilisateur->utilisateur_id )}}'>{{$reservation->utilisateur->nom}} {{$reservation->utilisateur->prenom}}</a></td>
                            <td>{{$reservation->salle->salle_nom}}</td>
                            <td>{{$reservation->date_reservation}}</td>
                            <td>{{$reservation->periode->libelle}}</td>
                            <td class="overflow-hidden">{{$reservation->reservation_commentaire}}</td>
                            <td class="fw-bold">{{$reservation->statut->libelle}}</td>

                            <td class="align-self-end">
                                @if($reservation->statut->libelle == 'En attente')
                                    <form method="post" action="/reservation/approve">
                                        @csrf
                                        <input type="submit" class="btn btn-success" value="Approuver">
                                        <input type="hidden" name="reservation_id" value="{{$reservation->reservation_id}}">
                                    </form>
                                @endif

                                @if($reservation->statut->libelle != 'Annulée')
                                        <form method="post" action="/reservation/reject">
                                            @csrf
                                            <input type="submit" class="btn btn-danger" value="Annuler">
                                            <input type="hidden" name="reservation_id" value="{{$reservation->reservation_id}}">
                                        </form>
                                @else
                                        <form method="post" action="/reservation/delete">
                                            @csrf
                                            <input type="submit" class="btn btn-danger" value="Supprimer">
                                            <input type="hidden" name="reservation_id" value="{{$reservation->reservation_id}}">
                                        </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
