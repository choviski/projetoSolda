<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SoldadorQualificacao;

class RelatorioQualificacao extends Controller
{
    function relatorioQualificacao(){
        $usuario = session()->get("Usuario");
        return view('/relatorioQualificacao')->with(["usuario"=>$usuario]);
    }

    public function relatorioVencimentoAjax(Request $request, $ano){
        if($request->ajax()){
            $nomeOpcao=$request->ano;
            $qualificacacoes = SoldadorQualificacao::orderBy('validade_qualificacao')->whereYear('validade_qualificacao',$request->ano)->get();
            $view = view('tabelaRelatorioVencimentos')->with(["qualificacaoes"=>$qualificacacoes])->render();
            return response()->json(['html'=>$view,'nomeOpcao'=>$nomeOpcao]);
        }
        return back();
    }

    public function relatorioQualificacaoAjax(Request $request, $opcao){
        if($request->ajax()){
            if($request->opcao==0){ //todas as qualificacoes
                $qualificacaoes=SoldadorQualificacao::orderBy('cod_rqs')->where("criado",1)->get();
                $nomeOpcao="Todas as qualificações";
            }elseif($request->opcao==1){ //apenas qualificados
                $qualificacaoes=SoldadorQualificacao::where('status','=','qualificado')->where("criado",1)->orderBy('cod_rqs')->get();
                $nomeOpcao="Qualificações em dia";
            }elseif($request->opcao==2){ //apenas nao qualificados
                $qualificacaoes=SoldadorQualificacao::where('status','=','nao-qualificado')->where("criado",1)->orderBy('cod_rqs')->get();
                $nomeOpcao="Não qualificados";
            }elseif($request->opcao==3){ //apenas vencidas
                $qualificacaoes=SoldadorQualificacao::where('status','=','atrasado')->where("criado",1)->orderBy('cod_rqs')->get();
                $nomeOpcao="Qualificações vencidas";
            }elseif($request->opcao==4){ //apenas qualificacoes pendentes (em avaliacao)
                $qualificacaoes=SoldadorQualificacao::where('status','=','em-processo')->where("criado",1)->orderBy('cod_rqs')->get();
                $nomeOpcao="Qualificações em processo";
            }
            $view = view('tabelaRelatorioQualificacoes')->with(["qualificacaoes"=>$qualificacaoes])->render();
            return response()->json(['html'=>$view,'nomeOpcao'=>$nomeOpcao]);
     
        }else{
            return back();
        }    


        

    }
}
