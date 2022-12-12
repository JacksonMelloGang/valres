<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    //

    function index(){

    }

    function show_roles(){
        $roles = \App\Models\Role::all();
        return view('admin.role.roles', ['roles' => $roles]);
    }

    function show_role_id($id){
        $role = \App\Models\Role::find($id);

        return view('admin.role.role', ['role' => $role]);
    }

    function create_role(){

    }

    function edit_role($id){
        $role = \App\Models\Role::find($id);

        if($role == null){
            return redirect()->route('show_roles')->withErrors(['error' => 'Role not found']);
        }

        return view('admin.role.role_edit', ['role' => $role]);
    }

    function delete_role($id){
        $role = Role::find($id);

        if($role == null){
            return redirect()->route('show_roles')->withErrors(['error' => 'Role not found']);
        }

        // return delete view controller
        return view('admin.role.role_delete', ['role' => $role]);
    }
}
