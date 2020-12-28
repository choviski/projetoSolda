<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Soldador;
use App\SoldadorQualificacao;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function inicio(Request $request)
    {
        $usuario = session()->get("Usuario");
        #Pegando todos os soldadores como administrador
        if($usuario->tipo==1){
            $soldadorqualificacaos = SoldadorQualificacao::where('status','!=','qualificado')->select()->orderBy('status','desc')->get();
            return view("inicio")->with(["soldadorqualificacaos"=>$soldadorqualificacaos,"usuario"=>$usuario]);
        }
        #Pegando os soldadores da empresa
        elseif($usuario->tipo==2){
            $empresa = Empresa::where('id_usuario','=',$usuario->id)->get();
            $soldadores = Soldador::where('id_empresa','=',$empresa[0]->id)->get();
            $soldadorqualificacaos=SoldadorQualificacao::where('id_soldador','=',$soldadores[0]->id)->where('status','!=','qualificado')->select()->orderBy('status','desc')->get();
            return view("inicio")->with(["soldadorqualificacaos"=>$soldadorqualificacaos,"usuario"=>$usuario]);;

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
