<?php

namespace App\Http\Controllers;

use App\EPSAvancada;
use Illuminate\Http\Request;
use App\Tecnico;

class EPSAvancadaController extends Controller
{   
    public function listarEpsAvancada(Request $request){
        $usuario = session()->get("Usuario");
        if($usuario->tipo==1){ // se é a infosolda pega todas as EPS
            $epsAvancadas = EpsAvancada::paginate(10);
        }else{ // se n for pega somente as da própria empresa
            $epsAvancadas = EpsAvancada::where("id_empresa",$usuario->empresa->id)->with('processos')->paginate(10);
        }
        return view("epsAvancada/listarEps")->with(["usuario"=>$usuario,"epsAvancadas"=>$epsAvancadas]);
    }

    public function cadastrarEpsAvancada(Request $request){
        $usuario = session()->get("Usuario");
        return view("epsAvancada/cadastrarEps")->with(["usuario"=>$usuario]);
    }

    public function armazenarEpsAvancada(Request $request){
        
        $usuario = session()->get("Usuario");
        $tecnica = Tecnico::create($request->all());
        $eps = EpsAvancada::create([
            'nome'=>$request->nome,
            'data'=>$request->data,
            'notas'=>$request->notas,
            'informacao_tecnica_id' => $tecnica->id,
            'id_empresa' => $usuario->empresa->id,
        ]);

        $processos = $request->input('processo_ids'); 
        $arrayProcessos = explode(",",$processos);
        
        if ($arrayProcessos) {
            foreach ($arrayProcessos as $processoId) {
                $eps->processos()->attach($processoId);
            }
        }
        dd($eps);      
    }

}
