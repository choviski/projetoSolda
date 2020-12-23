<?php

namespace App\Http\Controllers;

use App\NormaQualificacao;
use App\Norma;
use App\Qualificacao;
use Illuminate\Http\Request;

class NormaQualificacaoController extends Controller
{
    public function index()
    {
        $usuario = session()->get("Usuario");
        $normaqualificacao = NormaQualificacao::all();
        return view("cruds.normaqualificacao.index")->with(["normaqualificacaos"=>$normaqualificacao,"usuario"=>$usuario]);
    }

    public function create()
    {
        $usuario = session()->get("Usuario");
        $norma=Norma::all();
        $qualificacao=Qualificacao::all();
        return view("cruds.normaqualificacao.create")->with(["qualificacaos"=>$qualificacao,"normas"=>$norma,"usuario"=>$usuario]);
    }

    public function store(Request $request)
    {
        $usuario = session()->get("Usuario");
        NormaQualificacao::create($request->all());
        return redirect()->Route("normaqualificacao.index")->with(["usuario"=>$usuario,"usuario"=>$usuario]);;
    }

    public function show($id)
    {
        $usuario = session()->get("Usuario");
        $normaqualificacao=NormaQualificacao::find($id);
        return view("cruds.normaqualificacao.show")->with(["normaqualificacao"=>$normaqualificacao,"usuario"=>$usuario]);
    }

    public function edit($id)
    {
        $usuario = session()->get("Usuario");
        $norma=Norma::all();
        $qualificacao=Qualificacao::all();
        $normaqualificacao=NormaQualificacao::find($id);
        return view("cruds.normaqualificacao.edit")->with(["normaqualificacao"=>$normaqualificacao,"qualificacaos"=>$qualificacao,"normas"=>$norma,"usuario"=>$usuario]);
    }

    public function update(Request $request, $id)
    {
        $usuario = session()->get("Usuario");
        NormaQualificacao::find($id)->update($request->all());
        return redirect()->Route("normaqualificacao.index")->with(["usuario"=>$usuario]);;
    }

    public function destroy(Request $request)
    {
        NormaQualificacao::destroy($request->id);
        return redirect("/normaqualificacao");

    }
}
