<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmOrMaster
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
        }else if($usuario->tipo==2){
            if($usuario->id_empresa == $request->id_empresa){
                return $next($request);
            }
            return redirect()->route('hubSoldadores');
        }
    }
}
