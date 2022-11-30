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
            return abort(403, 'Not allowed to access this page, (user not found in administration table)');
        } else {
            if(!$user->isSecretaire() || !$user->isResponsable()){
                return abort(403, 'Not allowed to Reserve');
            }
        }

        return $next($request);
    }
}
