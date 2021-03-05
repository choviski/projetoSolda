<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Publicacao;
use App\Soldador;
use App\SoldadorQualificacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


class InicioController extends Controller
{
    public function inicio(Request $request)
    {
        $usuario = session()->get("Usuario");
        #Pegando todos os soldadores como administrador
        if($usuario->tipo==1){
            $soldadorqualificacaos = SoldadorQualificacao::where('status','!=','qualificado')->select()->orderBy('status','desc')->get();
            $i=SoldadorQualificacao::all()->count();
            $a=0;
            $soldadorqualificacaose=SoldadorQualificacao::all();
            $reprovacoes[$i]=[];
            foreach ( $soldadorqualificacaose as $s){
                $reprovacoes[$a]=SoldadorQualificacao::onlyTrashed()->where("id_soldador","=",$s->soldador->id)->where("id_qualificacao","=",$s->qualificacao->id)->count();
                $a=$a+1;
            }


            return view("inicio")->with(["soldadorqualificacaos"=>$soldadorqualificacaos,"usuario"=>$usuario,"reprovacoes"=>$reprovacoes]);
        }
        #Pegando os soldadores da empresa
        elseif($usuario->tipo==2){
            $empresa = Empresa::where('id_usuario','=',$usuario->id)->get();
            $soldadores = Soldador::where('id_empresa','=',$empresa[0]->id)->get();
            $soldadorqualificacaos=collect();


            #Checando se a soldadores cadastrados para nao ocorrer nenhum erro na view

            if(!$soldadores->isEmpty()) {
                foreach ($soldadores as $soldadore) {
                    $soldadors = (SoldadorQualificacao::where('id_soldador', '=', $soldadore->id)->where('status', '!=', 'qualificado')->select()->orderBy('status', 'desc')->get());
                    if (!empty($soldadors[0]->id)) {
                        foreach ($soldadors as $soldador){
                            $soldadorqualificacaos->push($soldador);
                        }
                    }
                }

                $soldadorqualificacaos=$soldadorqualificacaos->sortBy(['status','desc']);
                $soldadorqualificacaos1=$soldadorqualificacaos->count();

                $a=0;
                $reprovacoes[$soldadorqualificacaos1]=[];
                foreach ( $soldadorqualificacaos as $s){
                    $reprovacoes[$a]=SoldadorQualificacao::onlyTrashed()->where("id_soldador","=",$s->soldador->id)->where("id_qualificacao","=",$s->qualificacao->id)->count();
                    $a=$a+1;
                }


                return view("inicio")->with(["soldadorqualificacaos" => $soldadorqualificacaos, "usuario" => $usuario,"reprovacoes"=>$reprovacoes]);
            }else{
                $soldadorqualificacaos=null;
                return view("inicio")->with(["soldadorqualificacaos" => $soldadorqualificacaos, "usuario" => $usuario]);
            }
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
        $requalificacaoes = SoldadorQualificacao::where('status','=','em-processo')->select()->orderBy('created_at','desc')->get();

        return view("requalificacoes")->with(["usuario"=>$usuario,"requalificacaos"=>$requalificacaoes]);
    }

    public function listarEmpresas(){
        $usuario = session()->get("Usuario");
        $empresas = Empresa::all();
        return view("listarEmpresas")->with(["usuario"=>$usuario,"empresas"=>$empresas]);
    }

    public function listarSoldadores(){
        $usuario = session()->get("Usuario");

        $rota=Route::getCurrentRoute()->getName();
        if($usuario->tipo==1){
            $soldadores=Soldador::orderBy('nome')->get();
            return view("listarSoldadores")->with(["usuario"=>$usuario,"soldadores"=>$soldadores,"rota"=>$rota]);

        }
        if($usuario->tipo==2){
            $empresa=Empresa::where('id_usuario','=',$usuario->id)->first();
            $soldadores=Soldador::where('id_empresa','=',$empresa->id)->orderBy('nome')->get();
            return view("listarSoldadores")->with(["usuario"=>$usuario,"soldadores"=>$soldadores,"empresa"=>$empresa->id]);
        }

    }




}
