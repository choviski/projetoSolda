<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EpsProcesso;
use App\MaterialBase;
use App\MetalAdicao;
use App\PreAquecimento;
use App\PosAquecimento;
use App\PosicaoSoldagem;
use App\CaracteristicaEletrica;
use App\Gas;
use App\Junta;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\EpsAvancadaPosicaoSoldagemRequest;
use App\Http\Requests\EpsAvancadaJuntaRequest;
use App\Http\Requests\EpsAvancadaProcessoRequest;
use App\Http\Requests\EpsAvancadaMetalBaseRequest;
use App\Http\Requests\EpsAvancadaPreAquecimentoRequest;
use App\Http\Requests\EpsAvancadaPosAquecimentoRequest;
use App\Http\Requests\EpsAvancadaGasRequest;
use App\Http\Requests\EpsAvancadaCaracteristicasEletricasRequest;
use App\Http\Requests\EpsAvancadaMetalAdicaoRequest;

class EpsProcessoController extends Controller
{
    public function cadastraOuEditaProcesso(EpsAvancadaProcessoRequest $request){
        $validatedData = $request->validated();

        if(is_null($request->id_processo)){ // Cria
            $processo = EpsProcesso::create($request->all());
        }else{ // Edita
            $processo = EpsProcesso::find($request->id_processo);
            $processo->update($request->all());
        }
        return response()->json(['id' => $processo->id]);
    }

    public function cadastraOuEditaJunta(EpsAvancadaJuntaRequest $request){
        $validatedData = $request->validated();

        if(is_null($request->id_junta)){ // Cria
            $junta = Junta::create($request->all());
            $processo = EpsProcesso::find($request->id_processo);
            $processo->juntas()->attach($junta->id);
            $processo->save();
        }else{ // Edita
            $junta = Junta::find($request->id_junta);
            $junta->update($request->all());
        }
        return response()->json([
            'id' => $junta->id,
            'tipo_junta' => $junta->tipo_junta,
        ]);
    }

    public function getJunta($id){
        $junta = Junta::find($id);
        return response()->json($junta);
    }

    public function deleteJunta($id){
        Junta::destroy($id);
        return response()->json(['message'=>'ok']);
    }

    public function clonaJunta(Request $request){
        $ProcessoOriginal = EpsProcesso::find($request->processo_original);
        $ProcessoAtual = EpsProcesso::find($request->processo_atual);
        $juntasClonadas=[];
        foreach ($ProcessoOriginal->juntas as $junta){            
            $ProcessoAtual->juntas()->attach($junta->id);
            $juntasClonadas[$junta->id]= $junta->tipo_junta;
        }
        return response()->json(['message'=>'ok','juntas_clonadas'=>$juntasClonadas]);
    }

    public function cadastraOuEditaPosicaoSoldagem(EpsAvancadaPosicaoSoldagemRequest $request){
        $validatedData = $request->validated();

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

    public function cadastraOuEditaPreAquecimento(EpsAvancadaPreAquecimentoRequest $request){
        $validatedData = $request->validated();

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

    public function cadastraOuEditaPosAquecimento(EpsAvancadaPosAquecimentoRequest $request){
        $validatedData = $request->validated();

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

    public function cadastraOuEditaGas(EpsAvancadaGasRequest $request){
        $validatedData = $request->validated();

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

    public function cadastraOuEditaCaracteristicasEletricas(EpsAvancadaCaracteristicasEletricasRequest $request){
        $validatedData = $request->validated();

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
            'processo_nome' => $caracteristicas_eletricas->processo->qual_processo
        ]);
    }

    public function cadastraOuEditaMaterialBase(EpsAvancadaMetalBaseRequest $request){
        $validatedData = $request->validated();

        $request->merge(['eps_processo_id' => $request->id_processo]);
        if(is_null($request->id_material_base)){ // Cria
            $materialBase = MaterialBase::create($request->all());
        }else{ // Edita
            $materialBase = MaterialBase::find($request->id_material_base);
            $materialBase->update($request->all());
        }
        return response()->json([
            'material_id' => $materialBase->id,
            'material_nome' => $materialBase->metal_base,
        ]);
    }

    public function getMaterialBase($id){
        $materialBase = MaterialBase::find($id);
        return response()->json($materialBase);
    }

    public function deleteMaterialBase($id){
        MaterialBase::destroy($id);
        return response()->json(['message'=>'ok']);
    }

    public function cadastraOuEditaMetalAdicao(EpsAvancadaMetalAdicaoRequest $request){
        $validatedData = $request->validated();

        $request->merge(['eps_processo_id' => $request->id_processo]);
        if(is_null($request->id_metal_adicao)){ // Cria
            $metalAdicao = MetalAdicao::create($request->all());
        }else{ // Edita
            $metalAdicao = MetalAdicao::find($request->id_metal_adicao);
            $metalAdicao->update($request->all());
        }
        return response()->json([
            'metal_adicao_id' => $metalAdicao->id,
            'metal_adicao_nome' => $metalAdicao->f_numero,
        ]);
    }

    public function getMetalAdicao($id){
        $metal = MetalAdicao::find($id);
        return response()->json($metal);
    }

    public function deleteMetalAdicao($id){
        MetalAdicao::destroy($id);
        return response()->json(['message'=>'ok']);
    }

}
