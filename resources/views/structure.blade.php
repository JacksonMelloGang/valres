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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-12">
            <form>
                @csrf
                <input type="hidden" value="{{$structure->structure_id}}">
                <input value="submit" value="Supprimer" class="btn btn-danger">
            </form>
        </div>
    </div>
@endsection
