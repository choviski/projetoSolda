<?php

namespace App\Http\Controllers;

use App\Endereco;
use App\Cidade;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    public function index()
    {
        $usuario = session()->get("Usuario");
        $endereco = Endereco::all();
        return view("cruds.endereco.index")->with(["enderecos"=>$endereco,"usuario"=>$usuario]);
    }

    public function create()
    {
        $usuario = session()->get("Usuario");
        $cidades=Cidade::all();
        return view("cruds.endereco.create")->with(["cidades"=>$cidades,"usuario"=>$usuario]);
    }

    public function store(Request $request)
    {
        $usuario = session()->get("Usuario");
        Endereco::create($request->all());
        return redirect()->Route("endereco.index")->with(["usuario"=>$usuario]);
    }

    public function show($id)
    {
        $usuario = session()->get("Usuario");
        $endereco=Endereco::find($id);
        return view("cruds.endereco.show")->with(["endereco"=>$endereco,"usuario"=>$usuario]);
    }

    public function edit($id)
    {
        $usuario = session()->get("Usuario");
        $cidades=Cidade::all();
        $endereco=Endereco::find($id);
        return view("cruds.endereco.edit")->with(["endereco"=>$endereco,"cidades"=>$cidades,"usuario"=>$usuario]);
    }

    public function update(Request $request, $id)
    {
        $usuario = session()->get("Usuario");
        Endereco::find($id)->update($request->all());
        return redirect()->Route("endereco.index")->with(["usuario"=>$usuario]);;
    }

    public function destroy(Request $request)
    {
        Endereco::destroy($request->id);
        return redirect("/endereco");

    }
    public function cidadeAjax(Request $request){
        $cidadeCEP=Cidade::where('nome','=',$request->cidade)->first();
        return $cidadeCEP;
    }
}
