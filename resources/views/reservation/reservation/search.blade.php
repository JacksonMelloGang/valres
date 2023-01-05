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

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$cardtitle}}</h3>
        </div>
        <div class="card-body d-flex text-center">
            <form method="POST">
                @csrf
                <label for="structure_id">Structure:</label>
                <select name="structure_id">
                    @foreach($structures as $structure)
                        <option value="{{$structure->structure_id}}">{{$structure->structure_nom}}</option>
                    @endforeach
                </select>

                <input type="submit" value="Rechercher">
            </form>
            <br>
        </div>
    </div>

    @if($searched == true)
        @if(count($reservations) == 00)
            <p>Aucune réservation trouvée</p>
        @else
            <table class="table table-striped table-secondary" >
                <thead>
                <tr>
                    <th>Numero</th>
                    <th>Utilisateur</th>
                    <th>Salle</th>
                    <th>Date Reservation</th>
                    <th>Periode</th>
                    <th>Statut</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{$reservation->reservation_id}}</td>
                        <td>{{$reservation->utilisateur->nom}} {{$reservation->utilisateur->prenom}}</td>
                        <td>{{$reservation->salle->salle_nom}}</td>
                        <td>{{$reservation->date_reservation}}</td>
                        <td>{{$reservation->periode->libelle}}</td>
                        <td>{{$reservation->statut->libelle}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @endif
    @endif
@endsection
