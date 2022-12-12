@extends('reservation.layout.layout')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom et prénom</th>
            <th scope="col">Salle</th>
            <th scope="col">Date de début</th>
            <th scope="col">Date de fin</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reservations as $reservation)
            <tr>
                <th scope="row">{{ $reservation->reservation_id }}</th>
                <td>{{ $reservation->utilisateur->nom }}  {{$reservation->utilisateur->prenom}}</td>
                <td>{{ $reservation->salle->salle_nom }}</td>
                <td>{{ $reservation->date_reservation }}</td>
                <td>{{ $reservation->reservation_periode }} Jours</td>
                <td>{{ $reservation->statut }}</td>
                <td>
                    @if(Auth::user()->isAdministrateur())
                        <a href="{{ route('reservation.edit',$reservation->reservation_id) }}" class="btn btn-primary">Modifier</a>
                        <a href="{{ route('reservation.delete', $reservation->reservation_id) }}" class="btn btn-danger">Supprimer</a>
                    @else
                        <a href="{{ route('reservation_show', ['id' => $reservation->reservation_id]) }}" class="btn btn-primary">Consulter</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
