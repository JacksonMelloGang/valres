@extends('reservation.layout.layout')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Gestion des réservations</h3>
        </div>
        <div class="card-body text-center">
            <table class="table table-striped">
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
                                <a href="{{url('/reservation/edit/'.$reservation->reservation_id)}}" class="btn btn-success">Approuver</a>
                                <a href="{{url('/reservation/edit/'.$reservation->reservation_id)}}" class="btn btn-warning">Annuler</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
