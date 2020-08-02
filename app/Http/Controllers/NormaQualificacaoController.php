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
        $normaqualificacao = NormaQualificacao::all();
        return view("cruds.normaqualificacao.index")->with(["normaqualificacaos"=>$normaqualificacao]);
    }

    public function create()
    {
        $norma=Norma::all();
        $qualificacao=Qualificacao::all();
        return view("cruds.normaqualificacao.create")->with(["qualificacaos"=>$qualificacao,"normas"=>$norma]);
    }

    public function store(Request $request)
    {
        NormaQualificacao::create($request->all());
        return redirect()->Route("normaqualificacao.index");
    }

    public function show($id)
    {
        $normaqualificacao=NormaQualificacao::find($id);
        return view("cruds.normaqualificacao.show")->with(["normaqualificacao"=>$normaqualificacao]);
    }

    public function edit($id)
    {
        $norma=Norma::all();
        $qualificacao=Qualificacao::all();
        $normaqualificacao=NormaQualificacao::find($id);
        return view("cruds.normaqualificacao.edit")->with(["normaqualificacao"=>$normaqualificacao,"qualificacaos"=>$qualificacao,"normas"=>$norma]);
    }

    public function update(Request $request, $id)
    {
        NormaQualificacao::find($id)->update($request->all());
        return redirect()->Route("normaqualificacao.index");
    }

    public function destroy(Request $request)
    {
        NormaQualificacao::destroy($request->id);
        return redirect("/normaqualificacao");

    }
}
