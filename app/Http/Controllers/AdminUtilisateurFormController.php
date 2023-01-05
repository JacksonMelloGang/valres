<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUtilisateurFormController extends Controller
{
    //

    function create_user(Request $request){

        if($request->method() != 'POST'){
            // return with http error, invalid http method
            return response('Invalid HTTP method', 405);
        }

        if(!Auth::user()->hasRole('Administrateur')){
            // not allowed. return with http error
            return response('Not allowed', 403);
        }

        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'mail' => 'required|email',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',

            // if role is Utilisateur or Responsable, we need to specify a structure
            'structure' => 'required_if:role,==,Utilisateur|required_if:role,==,Responsable'
        ]);

        // check if username is not already taken
        if(User::where('username', $request->username)->first() != null){
            return redirect()->back()->withErrors(['Nom d\'utilisateur déjà utilisé']);
        }

        // create new user that we're going to save in db later
        $user = new \App\Models\User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->mail = $request->mail;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->id_role = $request->role;
        $user->save();

        // get id of the saved user
        $id = $user->utilisateur_id;

        // if role is Utilisateur, we need to create a new client
        if($request->role == 4 || $request->role == 2){
            $client = new Client();
            $client->utilisateur_id = $id;
            $client->structure_id = $request->structure;

            $client->save();
        }

        return redirect("/admin/user/{$id}")->with(['success' => 'Utilisateur créé avec succès']);
    }

    function update_user(Request $request){
        $request->validate([
            'id' => 'required|int',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'username' => 'required',
            'mail' => 'required|email',
            'userrole' => 'required|int',
            'structurerole' => 'required_if:userrole,==,4',
            'password' => 'nullable|string',
            'isbanned' => 'required|boolean',
        ]);

        $user = User::find($request->id);

        if($user == null){
            return redirect()->back()->withErrors(['Utilisateur introuvable']);
        }

        // check if user is trying to change his own role
        if($user->utilisateur_id == Auth::user()->utilisateur_id){
            if($user->id_role != $request->role){
                return redirect()->back()->withErrors(['Vous ne pouvez pas changer votre propre rôle']);
            }
        }


        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->mail = $request->mail;
        $user->username = $request->username;
        $user->id_role = $request->userrole;
        $user->is_banned = $request->isbanned;

        // crypt password if it's not null & update it
        if($request->password != null){
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // check if user has a client
        $client = $user->client;
        if($client != null) {
            // if user is a client, update it
            $client->structure_id = $request->structurerole;
            $client->save();
        } else {
            // means that user does not have a client //
            // if user is not an utilisateur or secretariat anymore, delete it
            if(($user->id_role != 4 || $user->id_role != 2)){
                $client->delete();
            } else {
                // else create a new client
                $client = new \App\Models\Client();
                $client->utilisateur_id = $request->id;
                $client->structure_id = $request->structurerole;
                $client->save();
            }
        }


        return redirect()->back()->with(['success' => 'Utilisateur mis à jour avec succès']);
    }

    function delete_user(Request $request){
        $request->validate([
            'id' => 'required|int'
        ]);

        $id = $request->id;

        $user = User::find($id);
        $hasFutureReservation = false;

        // can't delete user if it doesn't exist
        if($user == null){
            return redirect()->route('admin.users')->withErrors(['Utilisateur introuvable']);
        }

        // can't delete role
        if($user->hasRole('Administrateur')){
            return redirect()->route('admin.users')->withErrors(['Impossible de supprimer un administrateur']);
        }

        // check if user has any reservations
        if($user->reservations()->get() != null){
            // check if reservation_date is past now
            foreach($user->reservations()->get() as $reservation){
                if($reservation->reservation_date > now()){
                    $hasFutureReservation = true;
                }
            }
        }

        // if user has future reservation, redirect to user page
        if($hasFutureReservation){
            return redirect()->route('admin.users')->withErrors(['Impossible de supprimer un utilisateur ayant des réservations futures']);
        } else {
            // delete reservations
            foreach($user->reservations()->get() as $reservation){
                $reservation->delete();
            }

            // if user role is Utilisateur, means it has a structure, then delete it
            if($user->role()->first()->name == 'Utilisateur'){
                $user->client()->delete();
            }

            // delete user
            $user->delete();
        }




        return redirect()->route('admin.users')->with('success', 'Utilisateur supprimé');
    }


    function ban_user(Request $request){
        $request->validate([
            'id' => 'required|int'
        ]);

        $id = $request->id;

        $user = User::find($id);

        // can't ban user if it doesn't exist
        if($user == null){
            return redirect()->route('admin.users')->withErrors(['Utilisateur introuvable']);
        }

        // can't ban Administrateur
        if($user->hasRole('Administrateur')){
            return redirect()->route('admin.users')->withErrors(['Impossible de bannir un administrateur']);
        }

        // can't ban user if it's already banned
        if($user->is_banned){
            return redirect()->route('admin.users')->withErrors(['Utilisateur déjà banni']);
        }

        // ban user
        $user->is_banned = true;
        $user->save();

        return redirect()->route('admin.users')->with('success', 'Utilisateur banni');
    }

    function unban_user(Request $request){

        $request->validate([
            'id' => 'required|int'
        ]);

        $id = $request->id;

        $user = User::find($id);

        // can't unban user if it doesn't exist
        if($user == null){
            return redirect()->route('admin.users')->withErrors(['Utilisateur introuvable']);
        }

        // can't unban an user not banned
        if(!$user->is_banned){
            return redirect()->route('admin.users')->withErrors(['l\'Utilisateur n\'est pas banni']);
        }

        $user->is_banned = false;
        $user->save();

        return redirect()->route('admin.users')->with('success', 'Utilisateur débanni');
    }

}
