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
        $usuario = session()->get("Usuario");
        $soldadorqualificacaos = SoldadorQualificacao::all();

        return view("cruds.soldadorqualificacao.index")->with(["soldadorqualificacaos"=>$soldadorqualificacaos,"usuario"=>$usuario]);
    }

    public function create()
    {
        $usuario = session()->get("Usuario");
        $qualificoes=Qualificacao::all();
        $soldadors=soldador::all();
        return view("cruds.soldadorqualificacao.create")->with(["qualificaos"=>$qualificoes,"soldadors"=>$soldadors,"usuario"=>$usuario]);
    }

    public function store(Request $request)
    {
        $usuario = session()->get("Usuario");
        SoldadorQualificacao::create($request->all());
        return redirect()->Route("soldadorqualificacao.index")->with(["usuario"=>$usuario,"usuario"=>$usuario]);
    }

    public function show($id)
    {
        $usuario = session()->get("Usuario");
        $soldadorqualificacao=SoldadorQualificacao::find($id);
        return view("cruds.soldadorqualificacao.show")->with(["soldadorqualificacao"=>$soldadorqualificacao,"usuario"=>$usuario]);
    }

    public function edit($id)
    {
        $usuario = session()->get("Usuario");
        $qualificoes=Qualificacao::all();
        $soldadors=soldador::all();
        $soldadorqualificacao = SoldadorQualificacao::find($id);
        return view("cruds.soldadorqualificacao.edit")->with(["qualificaos"=>$qualificoes,"soldadors"=>$soldadors,"soldadorqualificacao"=>$soldadorqualificacao,"usuario"=>$usuario]);
    }

    public function update(Request $request, $id)
    {
       
        $usuario = session()->get("Usuario");
        SoldadorQualificacao::find($id)->update($request->all());
        return redirect()->Route("soldadorqualificacao.index")->with(["usuario"=>$usuario]);
    }

    public function destroy(Request $request)
    {
        SoldadorQualificacao::destroy($request->id);
        return redirect()->route("soldadorqualificacao.index");

    }
}
