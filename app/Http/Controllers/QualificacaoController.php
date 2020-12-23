<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Processo;
use App\Qualificacao;
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
}
