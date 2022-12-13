@include('admin.layout.layout')
@section('content')
    <div class="container d-flex justify-content-center flex-column">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors as $error)
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
                <form method="POST" action="{{url('/admin/user/create')}}">
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
                                <option value="{{$role->role_id}}">{{$role->libelle}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pseudo">Pseudonyme</label>
                        <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudonyme">
                    </div>
                    <div class="form-group">
                        <label for="structure">Structure</label>
                        <select class="form-control" id="structure" name="structure">
                            @foreach($structures as $structure)
                                <option value="{{$structure->structure_id}}">{{$structure->structure_nom}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Créer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
