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
        $user = Administration::find($request->session()->get('utilisateur_id'));
        if(!$user == null){
            abort(403, 'not allowed to access this page');
        }

        if(!$user->isSecretaire() || !$user->isResponsable()){
            abort(403, 'not allowed to reserve');
        }

        return $next($request);
    }
}
