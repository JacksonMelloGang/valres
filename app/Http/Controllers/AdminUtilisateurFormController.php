<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUtilisateurFormController extends Controller
{
    //

    function create_user(Request $request){

        if($request->method() != 'POST'){
            // return with http error, invalid http method
            return response('Invalid HTTP method', 405);
        }

        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
        ]);

        // create new user that we're going to save in db later
        $user = new \App\Models\User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        // get id of the saved user
        $id = $user->id;

        return redirect('/admin/utilisateur/{id}')->with(['success' => 'Utilisateur créé avec succès']);
    }

    function update_user(Request $request){
        $request->validate([
            'id' => 'required|int',
            'nom' => 'required',
            'prenom' => 'required',
            'pseudo' => 'required',
            'mail' => 'required|email',
            'role' => 'required',
            'isbanned' => 'required',
        ]);

    }

    function delete_user(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $user = \App\Models\User::find($request->id);

        if($user == null){
            return response('Utilisateur introuvable', 404);
        }

        $user->delete();

        return view('admin.user.utilisateurs', ['success' => 'Utilisateur supprimé avec succès']);
    }
}
