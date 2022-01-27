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
    public function relatorioQualificacaoAjax(Request $request, $opcao){

        if($request->ajax()){
            if($request->opcao==0){ //todas as qualificacoes
                $qualificacaoes=SoldadorQualificacao::orderBy('cod_rqs')->get();
                $nomeOpcao="Todas as qualificações";
            }elseif($request->opcao==1){ //apenas qualificados
                $qualificacaoes=SoldadorQualificacao::where('status','=','qualificado')->orderBy('cod_rqs')->get();
                $nomeOpcao="Qualificações em dia";
            }elseif($request->opcao==2){ //apenas nao qualificados
                $qualificacaoes=SoldadorQualificacao::where('status','=','nao-qualificado')->orderBy('cod_rqs')->get();
                $nomeOpcao="Não qualificados";
            }elseif($request->opcao==3){ //apenas vencidas
                $qualificacaoes=SoldadorQualificacao::where('status','=','atrasado')->orderBy('cod_rqs')->get();
                $nomeOpcao="Qualificações vencidas";
            }elseif($request->opcao==4){ //apenas qualificacoes pendentes (em avaliacao)
                $qualificacaoes=SoldadorQualificacao::where('status','=','em-processo')->orderBy('cod_rqs')->get();
                $nomeOpcao="Qualificações em processo";
            }
            $view = view('tabelaRelatorioQualificacoes')->with(["qualificacaoes"=>$qualificacaoes])->render();
            return response()->json(['html'=>$view,'nomeOpcao'=>$nomeOpcao]);
     
        }else{
            return back();
        }    


        

    }
}
