<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EpsProcesso;
use App\PreAquecimento;
use App\PosAquecimento;
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
}
