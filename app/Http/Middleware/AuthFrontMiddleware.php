<?php

namespace App\Http\Middleware;

use Closure;


class AuthFrontMiddleware
{
    public function handle($request, Closure $next, $keyEvento = '')
    {
        $evento = config('constantes.eventos.'.$keyEvento,false);
        $registroExterno = isset($evento['registroExterno']) ? $evento['registroExterno'] : false;
        if ($evento && \FrontHelper::getCookieRegistrado($evento['cookie']) !== null)
        {
            return $next($request);
        } 
        else if ($registroExterno) 
        {
            return $next($request);
        }
        
        return redirect()->route($keyEvento ? $keyEvento.'.home' : 'home');
    }
}
