<?php

namespace App\Http\Controllers;

use App\Endereco;
use App\Cidade;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    public function index()
    {
        $endereco = Endereco::all();
        return view("cruds.endereco.index")->with(["enderecos"=>$endereco]);
    }

    public function create()
    {
        $cidades=Cidade::all();
        return view("cruds.endereco.create")->with(["cidades"=>$cidades]);
    }

    public function store(Request $request)
    {
        Endereco::create($request->all());
        return redirect()->Route("endereco.index");
    }

    public function show($id)
    {
        $endereco=Endereco::find($id);
        return view("cruds.endereco.show")->with(["endereco"=>$endereco]);
    }

    public function edit($id)
    {
        $cidades=Cidade::all();
        $endereco=Endereco::find($id);
        return view("cruds.endereco.edit")->with(["endereco"=>$endereco,"cidades"=>$cidades]);
    }

    public function update(Request $request, $id)
    {
        Endereco::find($id)->update($request->all());
        return redirect()->Route("endereco.index");
    }

    public function destroy(Request $request)
    {
        Endereco::destroy($request->id);
        return redirect("/endereco");

    }
}
