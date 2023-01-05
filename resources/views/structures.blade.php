@extends('admin.layout.layout')
@section('content')

    <div class="container d-flex justify-content-center flex-column">
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


        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Utilisateurs</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">

                    <div class="d-flex align-content-center mb-1">
                        <h3 class="flex-grow-1">Liste des utilisateurs</h3>
                        <a class="btn btn-primary align-self-end" href="{{route('admin.structure.create')}}">Créer une structure</a>
                        <br>
                    </div>

                <div class="row d-flex justify-content-center">
                    <table class="col-6 table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Adresse</th>
                            <th scope="col">Categorie</th>
                            <th scope="col">Actions</th>
                        </thead>
                        <tbody>
                        @foreach($structures as $structure)
                            <tr>
                                <td>{{$structure->structure_id}}</td>
                                <td>{{$structure->nom}}</td>
                                <td>{{$structure->structure_adresse}}</td>
                                <td>{{$structure->categorie->libelle}}</td>
                                @if(Auth::user()->isAdministrateur())
                                    <td>
                                        <form action="/admin/structure/delete" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{$structure->structure_id}}" name="structure_id">
                                            <input type="submit" value="Supprimer" class="btn btn-danger">
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
