<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Soldador;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function inicio(Request $request)
    {
        $usuario = session()->get("Usuario");
        #Pegando todos os soldadores como administrador
        if($usuario->tipo==1){
            $soldadores = Soldador::where('status','!=','qualificado')->select()->orderBy('status','desc')->get();
            return view("inicio")->with(["soldadores"=>$soldadores,"usuario"=>$usuario]);
        }
        #Pegando os soldadores da empresa
        elseif($usuario->tipo==2){
            $empresa = Empresa::where('id_usuario','=',$usuario->id)->get();
            $soldadores = Soldador::where('id_empresa','=',$empresa[0]->id)->where('status','!=','qualificado')->select()->orderBy('status','desc')->get();
            return view("inicio")->with(["soldadores"=>$soldadores,"usuario"=>$usuario]);;

        }



    }

    public function entidades(Request $request)
    {
        $usuario = session()->get("Usuario");
        return view("entidades")->with(["usuario"=>$usuario]);
    }
    public function cadastrar(Request $request){
        $usuario = session()->get("Usuario");
        return view("cadastrar")->with(["usuario"=>$usuario]);
    }
    public function requalificacoes(Request $request){
        $usuario = session()->get("Usuario");
        return view("requalificacoes")->with(["usuario"=>$usuario]);
    }

}
