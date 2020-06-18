<?php

namespace App\Http\Middleware;

use Closure;


class AuthFrontMiddleware
{
    public function handle($request, Closure $next)
    {
        if (\Cookie::get('registrado',null) !== null)
        {
            return $next($request);
        }
        return redirect()->route('registro');
    }
}
