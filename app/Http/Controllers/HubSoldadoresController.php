<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Soldador;
use App\SoldadorQualificacao;
use Illuminate\Http\Request;

class HubSoldadoresController extends Controller
{
    public function hubSoldadores(Request $request)
    {
        $usuario = session()->get("Usuario");
        #Pegando todos os soldadores como administrador
        if($usuario->tipo==1){
            $soldadorqualificacaos = SoldadorQualificacao::all();
            return view("soldadores")->with(["soldadores"=>$soldadorqualificacaos,"usuario"=>$usuario]);
        }
        #Pegando os soldadores da empresa
        elseif($usuario->tipo==2){
            $empresa = Empresa::where('id_usuario','=',$usuario->id)->get();
            $soldadores = Soldador::where('id_empresa','=',$empresa[0]->id)->get();
            $soldadorqualificacaos=collect();
            #Checando se a soldadores cadastrados para nao ocorrer nenhum erro na view
            if(!$soldadores->isEmpty()) {
                foreach ($soldadores as $soldadore) {
                    $soldadorqualificacaos->push(SoldadorQualificacao::where('id_soldador', '=', $soldadore->id)->select()->orderBy('status', 'desc')->get());
                }
                return view("soldadores")->with(["soldadores"=>$soldadorqualificacaos,"usuario"=>$usuario]);
            }else{
                $soldadorqualificacaos=null;
                return view("soldadores")->with(["soldadores"=>$soldadorqualificacaos,"usuario"=>$usuario]);
            }

        }
    }

}
