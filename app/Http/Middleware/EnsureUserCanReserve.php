<?php

namespace App\Http\Middleware;

use App\Models\Role;
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

        // get user
        $user = $request->user();

        // if responsable or secretariat, process request otherwise return 403 forbidden
        if($user->isResponsable() || $user->isSecretaire() || $user->isAdministrateur()){
            return $next($request);
        }


        return abort(403, 'Not allowed to access this page');
    }
}
