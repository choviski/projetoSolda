<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Soldador;
use App\Acesso;
use Illuminate\Support\Facades\DB;

class AcessoController extends Controller
{
    function acessoControler(){
        $usuario = session()->get("Usuario");
        return view('/controleAcesso')->with(["usuario"=>$usuario]);
    }
    
    public function controleAcessoAjax(Request $request, $dataInicial, $dataFinal){
        
        $acessos=Acesso::whereBetween(DB::raw('DATE(created_at)'), array($dataInicial, $dataFinal))->get();

     
        if ($request->ajax()){
            $view = view('tabelaAcessos')->with(["acessos"=>$acessos])->render();
            return response()->json(['html'=>$view]);
        }
        $view = view('tabelaAcessos')->with(["acessos"=>$acessos])->render();
        //dd($view);


    }
}
