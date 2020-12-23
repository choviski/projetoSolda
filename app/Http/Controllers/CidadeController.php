<?php

namespace App\Http\Controllers;

use App\Cidade;
use Illuminate\Http\Request;


class CidadeController extends Controller
{
    public function index()
    {
        $usuario = session()->get("Usuario");
        $cidade = Cidade::all();
        return view("cruds.cidade.index")->with(["cidades"=>$cidade,"usuario"=>$usuario]);
    }

    public function create()
    {
        $usuario = session()->get("Usuario");
        return view("cruds.cidade.create")->with(["usuario"=>$usuario]);
    }

    public function store(Request $request)
    {
        $usuario = session()->get("Usuario");
        Cidade::create($request->all());
        return redirect()->Route("cidade.index")->with(["usuario"=>$usuario]);
    }

    public function show($id)
    {
        $usuario = session()->get("Usuario");
        $cidade=Cidade::find($id);
        return view("cruds.cidade.show")->with(["cidade"=>$cidade,"usuario"=>$usuario]);
    }

    public function edit($id)
    {
        $usuario = session()->get("Usuario");
        $cidade=Cidade::find($id);
        return view("cruds.cidade.edit")->with(["cidade"=>$cidade,"usuario"=>$usuario]);
    }

    public function update(Request $request, $id)
    {
        $usuario = session()->get("Usuario");
        Cidade::find($id)->update($request->all());
        return redirect()->Route("cidade.index")->with(["usuario"=>$usuario]);
    }

    public function destroy(Request $request)
    {
        Cidade::destroy($request->id);
        return redirect("/cidade");

    }
}
