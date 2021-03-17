<?php

namespace App\Http\Middleware;

use Closure;

class CheckSession
{
    public function handle($request, Closure $next)
    {

        if(!$request->session()->has('Usuario')) {
            return redirect()->route('inicio');
        }
        return $next($request);
    }
}
