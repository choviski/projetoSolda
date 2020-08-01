<?php

namespace App\Http\Controllers;

use App\Cidade;
use Illuminate\Http\Request;


class CidadeController extends Controller
{
    public function index()
    {
        $cidade = Cidade::all();
        return view("cruds.cidade.index")->with(["cidades"=>$cidade]);
    }

    public function create()
    {
        return view("cruds.cidade.create");
    }

    public function store(Request $request)
    {
        Cidade::create($request->all());
        return redirect()->Route("cidade.index");
    }

    public function show($id)
    {
        $cidade=Cidade::find($id);
        return view("cruds.cidade.show")->with(["cidade"=>$cidade]);
    }

    public function edit($id)
    {
        $cidade=Cidade::find($id);
        return view("cruds.cidade.edit")->with(["cidade"=>$cidade]);
    }

    public function update(Request $request, $id)
    {
        Cidade::find($id)->update($request->all());
        return redirect()->Route("cidade.index");
    }

    public function destroy(Request $request)
    {
        Cidade::destroy($request->id);
        return redirect("/cidade");

    }
}
