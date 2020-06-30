<?php

namespace App\Http\Middleware;

use Closure;


class AuthFrontMiddleware
{
    public function handle($request, Closure $next)
    {
        if (\FrontHelper::getCookieRegistrado() !== null)
        {
            return $next($request);
        }
        return redirect()->route('home');
    }
}
