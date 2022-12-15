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
            <h3 class="card-title">Création d'une réservation</h3>
        </div>
        <div class="card-body">
            <form action="{{url('/reservation/create')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="utilisateur_id">Nom d'utilisateur</label>
                    <select class="form-select"  name="utilisateur_id">
                        @if(Auth::user()->role->libelle != 'Utilisateur')
                            @foreach($utilisateurs as $user)
                                <option value="{{$user->utilisateur_id}}">{{$user->username}}</option>
                            @endforeach
                        @else
                            <option value="{{Auth::user()->utilisateur_id}}">{{Auth::user()->username}}</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="salle_id">Salle</label>
                    <select class="form-control form-select" name="salle_id">
                        @foreach($salles as $salle)
                            <option value="{{$salle->salle_id}}">{{$salle->salle_nom}} - {{$salle->categorie->libelle}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date_reservation">Date</label>
                    <input type="date" class="form-control" id="date_reservation" name="date_reservation" min="{{date('Y-m-d')}}">
                </div>
                <div class="form-group">
                    <label for="reservation_periode">Période</label>
                    <select class="form-control form-select" name="reservation_periode">
                        <option value="1">Matin</option>
                        <option value="2">Après-Midi</option>
                        <option value="3">Soir</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Commentaire</label>
                    <input type="text" class="form-control" id="commentaire" name="commentaire" placeholder="Commentaires">
                </div>
                <div class="form-group">
                    <label for="reservation_statut">Statut de la Réservation</label>
                    <select class="form-control form-select" name="reservation_statut">
                        @if(Auth::user()->role->libelle != 'Utilisateur')
                            @foreach($reservation_statuts as $statut)
                                <option value="{{$statut->reservation_statut_id}}">{{$statut->libelle}}</option>
                            @endforeach
                        @else
                            <option value="2">En attente</option>
                        @endif
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Créer</button>
            </form>
        </div>
    </div>
@endsection
