<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Soldador;
use Illuminate\Http\Request;

class HubSoldadoresController extends Controller
{
    public function hubSoldadores(Request $request)
    {
        $usuario = session()->get("Usuario");
        #Pegando todos os soldadores como administrador
        if($usuario->tipo==1){
            $soldadores = Soldador::select()->orderBy('status','desc')->get();
            return view("soldadores")->with(["soldadores"=>$soldadores,"usuario"=>$usuario]);
        }
        #Pegando os soldadores da empresa
        elseif($usuario->tipo==2){
            $empresa = Empresa::where('id_usuario','=',$usuario->id)->get();
            $soldadores = Soldador::where('id_empresa','=',$empresa[0]->id)->select()->orderBy('status','desc')->get();
            return view("soldadores")->with(["soldadores"=>$soldadores,"usuario"=>$usuario]);;

        }
    }

}
