@extends('reservation.layout.layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Modification de la réservation N°{{$reservation->reservation_id}}</h3>
        </div>
        <div class="card-body">
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

            <form action="{{url('/reservation/edit')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="utilisateur_id">Utilisateur</label>
                    <select class="form-select form-control" name="utilisateur_id">
                        @foreach($utilisateurs as $user)
                            @if($user->utilisateur_id == $reservation->utilisateur_id)
                                <option value="{{$user->utilisateur_id}}" selected>{{$user->nom}} {{$user->prenom}}</option>
                            @else
                                <option value="{{$user->utilisateur_id}}">{{$user->nom}} {{$user->prenom}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="salle_id">Salle</label>
                    <select class="form-select form-control" name="salle_id">
                        @foreach($salles as $salle)
                            @if($salle->salle_id == $reservation->salle_id)
                                <option value="{{$salle->salle_id}}" selected>{{$salle->salle_nom}}</option>
                            @else
                                <option value="{{$salle->salle_id}}">{{$salle->salle_nom}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date_reservation">Date</label>
                    <input type="text" name="date_reservation" id="date_reservation" class="form-control" value="{{$reservation->date_reservation}}">
                </div>
                <div class="form-group">
                    <label for="reservation_periode">Durée</label>
                    <select class="form-select" name="reservation_periode">
                        <option value="1">8h00 - 12h00</option>
                        <option value="2">13h00 - 19h00</option>
                        <option value="3">19h00 - 22h00</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="commentaire">Commentaire</label>
                    <input type="text" name="commentaire" id="commentaire" class="form-control" value="{{$reservation->reservation_commentaire}}">
                </div>
                <div class="form-group">
                    <label for="date">Statut</label>
                    <select class="form-select form-control" name="reservation_statut">
                        @foreach($reservation_statuts as $statut)
                            @if($statut->reservation_statut_id == $reservation->reservation_statut_id)
                                <option value="{{$statut->reservation_statut_id}}" selected>{{$statut->libelle}}</option>
                            @else
                                <option value="{{$statut->reservation_statut_id}}">{{$statut->libelle}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="reservation_id" value="{{$reservation->reservation_id}}">

                <button type="submit" class="btn btn-primary mt-2">Modifier</button>
            </form>
        </div>
    </div>
@endsection
