@extends('admin.layout.layout')
@section('content')

    <div class="row mt-2">

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

        <div class="col-md-6">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Information à propos de la salle {{$salle->salle_nom}}</h5>
                </div>
                <div class="card-body">

                    <table class="table table-striped table-secondary">
                        <tbody>
                        <tr>
                            <td>ID</td>
                            <td>{{$salle->salle_id}}</td>
                        </tr>
                        <tr>
                            <td>Nom de la Salle</td>
                            <td>{{$salle->salle_nom}}</td>
                        </tr>
                        <tr>
                            <td>Catégorie</td>
                            <td>{{$salle->categorie->libelle}}</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Modifier la salle') }}</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="/admin/salle/edit">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>{{ __('Nom de salle') }}</label>
                                    <input type="text" class="form-control" name="salle_nom" value="{{ $salle->salle_nom }}">
                                    <label>{{ __('Catégorie de la salle') }}</label>
                                    <select class="form-control" name="categorie_salle">
                                        @foreach($categories as $categorie)
                                            <option value="{{$categorie->cat_id}}">{{$categorie->libelle}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <input type="hidden" name="salle_id" value="{{$salle->salle_id}}">
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
