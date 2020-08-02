<?php

namespace App\Http\Controllers;

use App\SoldadorQualificacao;
use App\Soldador;
use App\Qualificacao;
use Illuminate\Http\Request;

class SoldadorQualificacaoController extends Controller
{
    public function index()
    {
        $soldadorqualificacaos = SoldadorQualificacao::all();

        return view("cruds.soldadorqualificacao.index")->with(["soldadorqualificacaos"=>$soldadorqualificacaos]);
    }

    public function create()
    {
        $qualificoes=Qualificacao::all();
        $soldadors=soldador::all();
        return view("cruds.soldadorqualificacao.create")->with(["qualificaos"=>$qualificoes,"soldadors"=>$soldadors]);
    }

    public function store(Request $request)
    {
        SoldadorQualificacao::create($request->all());
        return redirect()->Route("soldadorqualificacao.index");
    }

    public function show($id)
    {
        $soldadorqualificacao=SoldadorQualificacao::find($id);
        return view("cruds.soldadorqualificacao.show")->with(["soldadorqualificacao"=>$soldadorqualificacao]);
    }

    public function edit($id)
    {
        $qualificoes=Qualificacao::all();
        $soldadors=soldador::all();
        $soldadorqualificacao = SoldadorQualificacao::find($id);
        return view("cruds.soldadorqualificacao.edit")->with(["qualificaos"=>$qualificoes,"soldadors"=>$soldadors,"soldadorqualificacao"=>$soldadorqualificacao]);
    }

    public function update(Request $request, $id)
    {
        SoldadorQualificacao::find($id)->update($request->all());
        return redirect()->Route("soldadorqualificacao.index");
    }

    public function destroy(Request $request)
    {
        SoldadorQualificacao::destroy($request->id);
        return redirect("/soldadorqualificacaos");

    }
}
