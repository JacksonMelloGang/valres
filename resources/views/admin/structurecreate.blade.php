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
        <div class="card">
            <div class="card-header">
                Créer une structure
            </div>
            <div class="card-body">
                <form method="POST" action="/admin/structure/create">
                    @csrf
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">

                        <label for="adresse">Adresse</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse">

                        <label for="categorie">Categorie</label>
                        <select class="form-control" id="categorie" name="categorie">
                            @foreach($categories as $categorie)
                                <option value="{{$categorie->categorie_id}}">{{$categorie->libelle}}</option>
                            @endforeach
                        </select>

                        <input type="submit" class="btn btn-primary mt-2" value="Créer la structure">
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection
