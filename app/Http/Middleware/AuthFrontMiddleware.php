<?php

namespace App\Http\Middleware;

use Closure;


class AuthFrontMiddleware
{
    public function handle($request, Closure $next, $evento = '')
    {
        if (\FrontHelper::getCookieRegistrado($evento) !== null)
        {
            return $next($request);
        }
        
        return redirect()->route($evento ? $evento.'.home' : 'home');
    }
}
