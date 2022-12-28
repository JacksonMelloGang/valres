@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Profil de {{ $user->nom }}</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar de {{ $user->nom }}" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <h2>Informations</h2>
                        <p><strong>Identifiant : </strong>{{ $user->utilisateur_id}}</p>
                        <p><strong>Nom : </strong>{{ $user->nom }} {{$user->prenom}}</p>
                        <p><strong>Email : </strong>{{ $user->mail }}</p>
                        <p><strong>Créé le : </strong>{{ $user->created_at }}</p>
                        <p><strong>Modifié le : </strong>{{ $user->updated_at }}</p>
                        <p><strong>Role : </strong>{{ $user->role->libelle }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
