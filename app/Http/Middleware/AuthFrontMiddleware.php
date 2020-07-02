<?php

namespace App\Http\Middleware;

use Closure;


class AuthFrontMiddleware
{
    public function handle($request, Closure $next, $redirectTo = 'home')
    {
        \Log::info($redirectTo);
        
        if (\FrontHelper::getCookieRegistrado($redirectTo === 'home' ? '' : 'test_') !== null)
        {
            return $next($request);
        }
        
        return redirect()->route($redirectTo);
    }
}
