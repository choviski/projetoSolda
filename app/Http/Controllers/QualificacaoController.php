<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Processo;
use App\Qualificacao;
use App\SoldadorQualificacao;
use Illuminate\Http\Request;

class QualificacaoController extends Controller
{
    public function index()
    {
        $usuario = session()->get("Usuario");
        $qualificacoes = Qualificacao::all();
        return view("cruds.qualificacao.index")->with(["qualificacoes"=>$qualificacoes,"usuario"=>$usuario]);
    }
    public function create()
    {
        $usuario = session()->get("Usuario");
        $processos = Processo::all();
        return view("cruds.qualificacao.create")->with(["processos"=>$processos,"usuario"=>$usuario]);
    }
    public function store(Request $request)
    {
        $usuario = session()->get("Usuario");
        Qualificacao::create($request->all());
        return redirect()->route("qualificacao.index")->with(["usuario"=>$usuario,"usuario"=>$usuario]);
    }
    public function show($id)
    {
        $usuario = session()->get("Usuario");
        $qualificacao=Qualificacao::find($id);
        return view("cruds.qualificacao.show")->with(["qualificacao"=>$qualificacao,"usuario"=>$usuario]);
    }
    public function edit($id)
    {
        $usuario = session()->get("Usuario");
        $processos = Processo::all();
        $qualificacao=Qualificacao::find($id);
        return view("cruds.qualificacao.edit")->with(["qualificacao"=>$qualificacao,"processos"=>$processos,"usuario"=>$usuario]);
    }
    public function update(Request $request, $id)
    {
        $usuario = session()->get("Usuario");
        Qualificacao::find($id)->update($request->all());
        return redirect()->route("qualificacao.index")->with(["usuario"=>$usuario]);
    }
    public function destroy(Request $request)
    {
        $usuario = session()->get("Usuario");
        Qualificacao::destroy($request->id);
        return redirect("/qualificacao");
    }
    public function requalificar(Request $request){
        $soldadorQualificacao=SoldadorQualificacao::where("id","=",$request->soldadorQualificacao)->get();
        $usuario = session()->get("Usuario");
        return view ("cadastrarNovaQualificacao")->with(["soldadorQualificacao"=>$soldadorQualificacao[0],"usuario"=>$usuario]);
    }
    public function editar($id,Request $request){
        $qualificacao=SoldadorQualificacao::find($id);
        $qualificacao->cod_rqs=$request->oi;
        $qualificacao->id_soldador=$request->id_soldador;
        $qualificacao->id_qualificacao=$request->id_qualificacao;
        $qualificacao->data_qualificacao=$request->data_qualificacao;
        $qualificacao->posicao=$request->posicao;
        $qualificacao->eletrodo=$request->eletrodo;
        $qualificacao->texto=$request->texto;
        $qualificacao->foto=$request->foto;
        $qualificacao->status="em-processo";
        $qualificacao->validade_qualificacao=$request->validade_qualificacao;
        $qualificacao->lancamento_qualificacao=$request->lancamento_qualificacao;
        $qualificacao->nome_certificado=$request->nome_certificado;
        $qualificacao->caminho_certificado=$request->caminho_certificado;
        $qualificacao->save();
        return redirect()->route("paginaInicial");
    }
}
