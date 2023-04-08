<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class IsAPITokenGood
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
        $IsTokenValid = false;

        // get the token from the request
        $token = $request->header('Authorization');

        // if the token is not null, check if it is good
        if ($token != null) {
            // get user by api token, if result is null, then token is invalid
            $user = \Illuminate\Foundation\Auth\User::all()->where('api_token', $token)->first();
            if($user != null){
                $IsTokenValid = true;
            }
        }

        // if the token is not good, return a 401 response
        if (!$IsTokenValid) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        return $next($request);
    }
}
