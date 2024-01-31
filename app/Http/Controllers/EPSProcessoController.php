<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EpsProcesso;
use App\PreAquecimento;
use App\PosAquecimento;
use App\PosicaoSoldagem;
use App\CaracteristicaEletrica;
use App\Gas;
use App\Junta;

class EPSProcessoController extends Controller
{
    public function cadastraOuEditaProcesso(Request $request){
        if(is_null($request->id_processo)){ // Cria            
            $processo = EpsProcesso::create($request->all());
        }else{ // Edita
            $processo = EpsProcesso::find($request->id_processo);
            $processo->update($request->all());
        }
        return response()->json(['id' => $processo->id]);
    }

    public function cadastraOuEditaJunta(Request $request){
        if(is_null($request->id_junta)){ // Cria
            $junta = Junta::create($request->all());
            $processo = EpsProcesso::find($request->id_processo);
            $processo->eps_junta_id = $junta->id;
            $processo->save();
        }else{ // Edita
            $junta = Junta::find($request->id_junta);
            $junta->update($request->all());
        }
        return response()->json(['id' => $junta->id]);
    }

    public function cadastraOuEditaPosicaoSoldagem(Request $request){
        if(is_null($request->id_posicao_soldagem)){ // Cria
            $posicao_soldagem = PosicaoSoldagem::create($request->all());
            $processo = EpsProcesso::find($request->id_processo);
            $processo->eps_posicao_soldagem_id = $posicao_soldagem->id;
            $processo->save();
        }else{ // Edita
            $posicao_soldagem = PosicaoSoldagem::find($request->id_posicao_soldagem);
            $posicao_soldagem->update($request->all());
        }
        return response()->json([
            'id' => $posicao_soldagem->id
        ]);
    }

    public function cadastraOuEditaPreAquecimento(Request $request){
        if(is_null($request->id_pre_aquecimento)){ // Cria
            $pre_aquecimento = PreAquecimento::create($request->all());
            $processo = EpsProcesso::find($request->id_processo);
            $processo->eps_pre_aquecimento_id = $pre_aquecimento->id;
            $processo->save();
        }else{ // Edita
            $pre_aquecimento = PreAquecimento::find($request->id_pre_aquecimento);
            $pre_aquecimento->update($request->all());
        }
        return response()->json(['id' => $pre_aquecimento->id]);
    }

    public function cadastraOuEditaPosAquecimento(Request $request){
        if(is_null($request->id_pos_aquecimento)){ // Cria
            $pos_aquecimento = PosAquecimento::create($request->all());
            $processo = EpsProcesso::find($request->id_processo);
            $processo->eps_pos_aquecimento_id = $pos_aquecimento->id;
            $processo->save();
        }else{ // Edita
            $pos_aquecimento = PosAquecimento::find($request->id_pos_aquecimento);
            $pos_aquecimento->update($request->all());
        }
        return response()->json(['id' => $pos_aquecimento->id]);
    }

    public function cadastraOuEditaGas(Request $request){
        if(is_null($request->id_gas)){ // Cria
            $gas = Gas::create($request->all());
            $processo = EpsProcesso::find($request->id_processo);
            $processo->eps_gas_id = $gas->id;
            $processo->save();
        }else{ // Edita
            $gas = Gas::find($request->id_gas);
            $gas->update($request->all());
        }
        return response()->json(['id' => $gas->id]);
    }

    public function cadastraOuEditaCaracteristicasEletricas(Request $request){
        if(is_null($request->id_caracteristicas_eletricas)){ // Cria
            $caracteristicas_eletricas = CaracteristicaEletrica::create($request->all());
            $processo = EpsProcesso::find($request->id_processo);
            $processo->eps_caracteristicas_eletrica_id = $caracteristicas_eletricas->id;
            $processo->save();
        }else{ // Edita
            $caracteristicas_eletricas = CaracteristicaEletrica::find($request->id_caracteristicas_eletricas);
            $caracteristicas_eletricas->update($request->all());
        }
        return response()->json([
            'id' => $caracteristicas_eletricas->id,
            'processo_id' => $caracteristicas_eletricas->processo->id,
            'processo_nome' => $caracteristicas_eletricas->processo->nome
        ]);
    }
    
}
