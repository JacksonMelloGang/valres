@extends('reservation.layout.layout')
@section('content')

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row d-flex">
        <div class="col-12">
            <h1>Information de la Réservation</h1>
            <h3>Réservation</h3>
            <table class="table table-striped table-bordered border-warning">
                <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{ $reservation->reservation_id }}</td>
                    </tr>
                    <tr>
                        <td>Client</td>
                        <td>{{ $reservation->utilisateur->nom }} {{ $reservation->utilisateur->prenom }}</td>
                    </tr>
                    <tr>
                        <td>Salle</td>
                        <td>{{ $reservation->salle->salle_nom }}</td>
                    </tr>
                    <tr>
                        <td>Date de début</td>
                        <td>{{ $reservation->date_reservation }}</td>
                    </tr>
                    <tr>
                        <td>Durée</td>
                        @if($reservation->reservation_periode == 1)
                            <td>8h30 - 12h30</td>
                        @elseif($reservation->reservation_periode == 2)
                            <td>11h30 - 14h30</td>
                        @elseif($reservation->reservation_periode == 3)
                            <td>14h00 - 18h00</td>
                        @elseif($reservation->reservation_periode == 4)
                            <td>18h30 - 23h00</td>
                        @endif
                    </tr>
                </tbody>
            </table>

            <br>

            @if(Auth::user()->role->id_role == 1 || Auth::user()->role->id_role == 3)
                <h3>Utilisateur</h3>
                <table class="table table-striped table-bordered border-warning">
                    <tbody>
                        <tr>
                            <td>ID</td>
                            <td>{{ $reservation->utilisateur->utilisateur_id }}</td>
                        </tr>
                        <tr>
                            <td>Nom</td>
                            <td>{{ $reservation->utilisateur->nom }}</td>
                        </tr>
                        <tr>
                            <td>Prénom</td>
                            <td>{{ $reservation->utilisateur->prenom }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $reservation->utilisateur->mail }}</td>
                        </tr>
                        <tr>
                            <td>Role</td>
                            <td>{{ $reservation->utilisateur->role->libelle }}</td>
                        </tr>
                    </tbody>
                </table>
            @endif
        </div>
    </div>

@endsection
