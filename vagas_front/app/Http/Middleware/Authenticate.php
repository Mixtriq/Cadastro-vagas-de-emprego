<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next){
        if (!Session::has('jwt_token')) {
            return redirect(route('login'));
        }
    
        return $next($request);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> parent of 4b99b0f (Revert "pog")
