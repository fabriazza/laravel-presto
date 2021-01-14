<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocaleMiddleware
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
        $browserLang = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
        $locale = session('locale', $browserLang);
        App::setLocale($locale);

        return $next($request);
    }
}
