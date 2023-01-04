@extends('admin.layout.layout')
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
    <div class="row d-flex justify-content-center">
        <table class="col-6 table table-striped table-bordered border-warning">
            <tbody>
                <tr>
                    <td>Id</td>
                    <td>{{ $utilisateur->utilisateur_id }}</td>
                </tr>
                <tr>
                    <td>Nom</td>
                    <td>{{ $utilisateur->nom }}</td>
                </tr>
                <tr>
                    <td>Prénom</td>
                    <td>{{ $utilisateur->prenom }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{$utilisateur->mail}}</td>
                </tr>
                <tr>
                    <td>Nom d'utilisateur</td>
                    <td>{{$utilisateur->username}}</td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td>{{$utilisateur->role->libelle}}</td>
                </tr>
                <tr>
                    <td>Banni</td>
                    @if($utilisateur->is_banned == 1)
                        <td>Oui</td>
                    @else
                        <td>Non</td>
                    @endif
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-12">
            @if(Auth::user()->role->id_role == 1)

                <a class="btn btn-primary" href="{{route('admin.user.edit', $utilisateur->utilisateur_id)}}">Modifier</a>
                @if($utilisateur->utilisateur_id != Auth::user()->utilisateur_id)
                    <form action="{{url('/admin/user/delete')}}" method="POST" class="d-inline">
                        @csrf
                        <input type="hidden" name="id" value="{{$utilisateur->utilisateur_id}}">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                @endif

            @endif
        </div>
    </div>
@endsection
