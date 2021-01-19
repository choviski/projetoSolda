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
            $soldadorqualificacaos = SoldadorQualificacao::select()->orderBy('status','desc')->get();
            $i=SoldadorQualificacao::all()->count();
            $a=0;
            $soldadorqualificacaose=SoldadorQualificacao::all();
            $reprovacoes[$i]=[];
            foreach ( $soldadorqualificacaose as $s){
                $reprovacoes[$a]=SoldadorQualificacao::onlyTrashed()->where("id_soldador","=",$s->soldador->id)->where("id_qualificacao","=",$s->qualificacao->id)->count();
                $a=$a+1;
            }
            return view("soldadores")->with(["soldadores"=>$soldadorqualificacaos,"usuario"=>$usuario,"reprovacoes"=>$reprovacoes]);
        }
        #Pegando os soldadores da empresa
        elseif($usuario->tipo==2){

            $empresa = Empresa::where('id_usuario','=',$usuario->id)->get();
            $soldadores = Soldador::where('id_empresa','=',$empresa[0]->id)->get();
            $soldadorqualificacaos=collect();

            #Checando se a soldadores cadastrados para nao ocorrer nenhum erro na view
            if(!$soldadores->isEmpty()) {
                foreach ($soldadores as $soldadore) {
                    $soldadors=SoldadorQualificacao::where('id_soldador', '=', $soldadore->id)->select()->orderBy('status', 'desc')->get();
                    foreach ($soldadors as $soldador){
                        $soldadorqualificacaos->push($soldador);
                    }
                    #$soldadorqualificacaos->push(SoldadorQualificacao::where('id_soldador', '=', $soldadore->id)->select()->orderBy('status', 'desc')->get());

                }
                $soldadorqualificacaos=$soldadorqualificacaos->sortBy(['status','desc']);
                $soldadorqualificacaos1=$soldadorqualificacaos->count();

                $a=0;
                $reprovacoes[$soldadorqualificacaos1]=[];
                foreach ( $soldadorqualificacaos as $s){
                    $reprovacoes[$a]=SoldadorQualificacao::onlyTrashed()->where("id_soldador","=",$s->soldador->id)->where("id_qualificacao","=",$s->qualificacao->id)->count();
                    $a=$a+1;
                }
                return view("soldadores")->with(["soldadores"=>$soldadorqualificacaos,"usuario"=>$usuario,"reprovacoes"=>$reprovacoes]);
            }else{
                $soldadorqualificacaos=null;
                return view("soldadores")->with(["soldadores"=>$soldadorqualificacaos,"usuario"=>$usuario]);
            }

        }
    }

}
