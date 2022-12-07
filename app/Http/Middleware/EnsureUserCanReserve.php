<?php

namespace App\Http\Middleware;

use App\Models\Administration;
use Closure;
use Illuminate\Http\Request;

class EnsureUserCanReserve
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

        $ok = false;

        if($request->user() == null){
            return redirect()->route('login')->withErrors([
                'error' => 'You must be logged in to access this page.',
            ]);
        }

        // get utilisateur_id from auth
        $utilisateur_id = $request->user()->utilisateur_id;

        // find administreur in administration model
        $user = Administration::where('utilisateur_id', $utilisateur_id)->first();


        if($user == null){
            return abort(403, 'Not allowed to access this page');
        } else {

            if($user->isAdministrateur()){
                $ok = true;
            }

            if($user->isResponsable()){
                $ok = true;
            }
        }

        if($ok){
            return $next($request);
        } else {
            return abort(403, 'Not allowed to access this page');
        }
    }
}
