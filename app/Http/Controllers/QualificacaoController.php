<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Qualificacao;
use Illuminate\Http\Request;

class QualificacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qualificacoes = Qualificacao::all();
        return view("cruds.qualificacao.index")->with(["qualificacoes"=>$qualificacoes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("cruds.qualificacao.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Qualificacao::create($request->all());
        return redirect()->route("qualificacao.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $qualificacao=Qualificacao::find($id);
        return view("cruds.qualificacao.show")->with(["qualificacao"=>$qualificacao]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $qualificacao=Qualificacao::find($id);
        return view("cruds.qualificacao.edit")->with(["qualificacao"=>$qualificacao]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Qualificacao::find($id)->update($request->all());
        return redirect()->route("qualificacao.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Qualificacao::destroy($request->id);
        return redirect("/qualificacao");
    }
}
