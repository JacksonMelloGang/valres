<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class AdminUtilisateurController extends Controller
{
    //
    function index(){
        $users = User::all();

        // roles
        $nb_roles = count(Role::all());

        // get number of users
        $nb_users = count(User::all());

        // get number of administraeur
        $nb_admin = 0;
        foreach($users as $user){
            if($user->hasRole('Administrateur')){
                $nb_admin++;
            }
        }

        $param = [
            'users' => $users,

            'nb_roles' => $nb_roles,
            'nb_users' => $nb_users,
            'nb_admin' => $nb_admin
        ];

        return view('admin.home', $param);
    }

    function show_users(){
        $users = User::all();

        return view('admin.user.utilisateurs', ['utilisateurs' => $users]);
    }

    function show_user($id){
        $user = User::find($id);
        if($user == null){
            return redirect()->route('admin.users')->withErrors(['Utilisateur introuvable']);
        }

        $role = $user->role()->first();

        return view('admin.user.utilisateur', ['utilisateur' => $user, 'role' => $role]);
    }

    function create_user(){
        $roles = Role::all();
        $structures = Structure::all();


        return view('admin.user.create', ['roles' => $roles, 'structures' => $structures]);
    }

    function edit_user($id){
        $user = User::find($id);

        if($user == null){
            return redirect()->route('admin.users')->withErrors(['Utilisateur introuvable']);
        }

        $roles = Role::all();
        $structures = Structure::all();

        // get role of user
        $role = $user->role()->first();

        // get client based on user id
        $client = $user->client()->first();
        if($client != null){
            // get structure
            $structure = $client->structure()->first();
        } else {
            $structure = null;
        }

        return view('admin.user.edit', ['utilisateur' => $user, 'roles' => $roles, 'userrole' => $role, 'structure' => $structure, 'client' => $client, 'structures' => $structures]);
    }



}
