@extends('layouts.app')
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
                    <div class="col-md-4">
                        <h2>Informations</h2>
                        <p><strong>Identifiant : </strong>{{ $user->utilisateur_id}}</p>
                        <p><strong>Nom : </strong>{{ $user->nom }} {{$user->prenom}}</p>
                        <p><strong>Email : </strong>{{ $user->mail }}</p>
                        <p><strong>Créé le : </strong>{{ $user->created_at }}</p>
                        <p><strong>Modifié le : </strong>{{ $user->updated_at }}</p>
                        <p><strong>Role : </strong>{{ $user->role->libelle }}</p>
                    </div>
                    <div class="col-md-4">
                        <form action="/profile" method="POST">
                            @csrf
                            <label class="form-label">Mot de passe: </label><br>
                            <input class="form-control" type="text" name="mdp">
                            <br>
                            <label class="form-label">Mail: </label><br>
                            <input class="form-control" type="email" name="mail">
                            <br><br>
                            <input type="submit" class="btn btn-primary" value="Modifier">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
