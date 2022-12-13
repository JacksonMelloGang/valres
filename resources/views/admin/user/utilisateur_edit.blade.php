@extends('admin.layout.layout')
@section('content')

    <div class="row">

        <div class="col-md-6">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Information à propos de l'utilisateur {{$utilisateur->nom}}</h5>
                </div>
                <div class="card-body">

                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td>Nom</td>
                            <td>{{$utilisateur->nom}}</td>
                        </tr>
                        <tr>
                            <td>Prénom</td>
                            <td>{{$utilisateur->prenom}}</td>
                        </tr>
                        <tr>
                            <td>Pseudonyme</td>
                            <td>{{$utilisateur->username}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$utilisateur->mail}}</td>
                        </tr>
                        <tr>
                            <td>Role</td>
                            <td>{{$userrole->libelle}}</td>
                        </tr>

                        <tr>
                            <td>Nom de la structure</td>
                            @if($structure == null)
                                <td>Non renseigné</td>
                            @else
                                <td>{{$structure->stucture_nom}}</td>
                            @endif
                        </tr>
                        <tr>
                            <td>Adresse de la structure</td>
                            @if($structure == null)
                                <td>Non renseigné</td>
                            @else
                                <td>{{$structure->structure_adresse}}</td>
                            @endif
                        </tr>


                        <tr>
                            <td>Créé le</td>
                            <td>{{$utilisateur->created_at}}</td>
                        </tr>
                        <tr>
                            <td>Modifié le</td>
                            <td>{{$utilisateur->updated_at}}</td>
                        </tr>

                        <tr>
                            <td>Banni ?</td>
                            @if($utilisateur->isbanned == 1)
                                <td>Oui</td>
                            @else
                                <td>Non</td>
                            @endif
                        </tr>
                        </tbody>
                    </table>
                    <hr>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mt-2">
                <div class="card-header">
                    <h5 class="title">{{ __('Modifier l\'utilisateur') }}</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="/admin/user/edit">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>{{ __('Nom') }}</label>
                                    <input type="text" class="form-control" name="nom" value="{{ $utilisateur->nom }}">
                                    <label>{{ __('Nom') }}</label>
                                    <input type="text" class="form-control" name="prenom" value="{{ $utilisateur->prenom }}">
                                    <label>{{ __('Email') }}</label>
                                    <input type="text" class="form-control" name="mail" value="{{ $utilisateur->mail }}">
                                    <label>{{__('Role')}}</label>
                                    <select class="form-control" name="role">
                                        @foreach($roles as $role)
                                            <option value="{{$role->role_id}}">{{$role->libelle}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>{{__('Pseudonyme')}}</label>
                                    <input type="text" class="form-control" name="pseudo" value="{{ $utilisateur->username }}">

                                    <label>{{__('Banni ?')}}</label>
                                    <select class="form-control" name="isbanned">
                                        <option value="0">Non</option>
                                        <option value="1">Oui</option>
                                    </select>

                                    <label>{{__('Structure')}}</label>
                                    <select class="form-control" name="role">
                                        @foreach($structures as $st)
                                            <option value="{{$st->structure_id}}">{{$st->structure_nom}}</option>
                                        @endforeach
                                    </select>

                                    <label>{{ __('Mot de passe') }}</label>
                                    <input type="password" class="form-control" name="password" value="">
                                </div>

                                <input type="hidden" name="id" value="{{$utilisateur->utilisateur_id}}">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="update ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary btn-round">{{ __('Modifier') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
