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
                <h1 class="text-center">Utilisateur</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="border border-danger rounded-2 px-2 py-2" method="POST" action="{{url('/admin/user/create')}}">
                    @csrf
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom">
                    </div>
                    <div class="form-group">
                        <label for="mail">Email</label>
                        <input type="email" class="form-control" id="mail" name="mail" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" id="role" name="role">
                            @foreach($roles as $role)
                                <option value="{{$role->id_role}}">{{$role->libelle}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="username">Nom d'utilisateur</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Nom d'utilisateur">
                        <label for="password">Mot de passe</label>
                        <input type="text" class="form-control" id="password" name="password" placeholder="Mot de passe">
                    </div>

                    <hr>
                    <div class="form-group" id="structure_div" style="display: none">
                        <label for="structure">Structure</label>
                        <select class="form-control" id="structure" name="structure">
                            @foreach($structures as $structure)
                                <option value="{{$structure->structure_id}}">{{$structure->structure_nom}} - {{$structure->structure_adresse}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Créer l'utilisateur</button>
                </form>
            </div>
        </div>

        <script>
            var select = document.getElementById('role');
            var div = document.getElementById('structure_div');
            select.onchange = function() {
                if (select.value == '4' || select.value == '2') {
                    div.style.display = 'block';
                } else {
                    div.style.display = 'none';
                }
            };
        </script>
    </div>
@endsection
