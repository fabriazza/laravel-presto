<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RevisorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user() && Auth::user()->is_revisor){
            
            return $next($request);
        }
        return redirect('/')->with('accesso.negato', 'accesso negato');
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 49db5471c933e51f7912eaa9f403f2cbe8b44b4d
