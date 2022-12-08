<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->user()){
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour accéder à cette page');
        }

        $userRole = $request->user()->id_role;

        $tableRole = Role::where('id_role', $userRole)->first();

        if($tableRole == null){
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour accéder à cette page');
        }

        // get role based on id_role of the user and check it's libelle is Administrateur
        if (!$tableRole->libelle == 'Administrateur') {
            return redirect()->route('dashboard')->with('error', 'Vous n\'avez pas les droits pour accéder à cette page');
        }


        return $next($request);
    }
}
