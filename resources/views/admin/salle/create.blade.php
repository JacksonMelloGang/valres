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

            <div class="row">
            <div class="col-12">
                <h1 class="text-center">Salle</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="border border-danger rounded-2 px-2 py-2" method="POST" action="{{url('/admin/salle/create')}}">
                    @csrf
                    <div class="form-group">
                        <label for="nom">Nom de salle</label>
                        <input type="text" class="form-control" id="salle_nom" name="salle_nom" placeholder="Nom de la salle">
                    </div>

                    <div class="form-group">
                        <label for="role">Catégorie</label>
                        <select class="form-control" id="categorie_id" name="categorie_id">
                            @foreach($categories as $categorie)
                                <option value="{{$categorie->cat_id}}">{{$categorie->libelle}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Créer la salle</button>
                </form>
            </div>
        </div>
    </div>
@endsection
