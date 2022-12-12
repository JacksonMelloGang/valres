<?php

namespace App\Http\Controllers;

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
            return redirect()->route('admin_users')->withErrors(['Utilisateur introuvable']);
        }

        $role = $user->role()->first();

        return view('admin.user.utilisateur', ['utilisateur' => $user, 'role' => $role]);
    }

    function create_user(){
        $roles = Role::all();

        return view('admin.user.utilisateur_create');
    }

    function edit_user($id){
        $user = User::findOrFail($id);
        $roles = Role::all();
        $role = $user->roles()->first();

        return view('admin.user.utilisateur_edit', ['utilisateur' => $user, 'roles' => $roles, 'user-role' => $role]);
    }

    function delete_user($id){

    }

}
