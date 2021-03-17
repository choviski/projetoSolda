<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdm
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $usuario=session("Usuario");

        if($usuario->tipo==1){
            return $next($request);
        }elseif ($usuario->tipo==2){
            return redirect()->route('hubSoldadores');
        }
    }
}
