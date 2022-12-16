<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    //
    function show_roles(){
        $roles = \App\Models\Role::all();

        return view('admin.role.roles', ['roles' => $roles]);
    }

    function show_role_id($id){
        $role = \App\Models\Role::find($id);

        if($role == null){
            return redirect()->route('admin.roles')->withErrors(['error' => 'Role introuvable']);
        }

        $users = User::all()->where('id_role', $id);

        return view('admin.role.role', ['role' => $role, 'users' => $users]);
    }


}
