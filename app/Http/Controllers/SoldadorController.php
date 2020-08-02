<?php

namespace App\Http\Controllers;

use App\Soldador;
use App\Empresa;
use Illuminate\Http\Request;

class SoldadorController extends Controller
{
    public function index()
    {
        $soldador = Soldador::all();
        return view("cruds.soldador.index")->with(["soldadors"=>$soldador]);
    }

    public function create()
    {
        $empresas=Empresa::all();
        return view("cruds.soldador.create")->with(["empresas"=>$empresas]);
    }

    public function store(Request $request)
    {
        Soldador::create($request->all());
        return redirect()->Route("soldador.index");
    }

    public function show($id)
    {
        $soldador=Soldador::find($id);
        return view("cruds.soldador.show")->with(["soldador"=>$soldador]);
    }

    public function edit($id)
    {
        $empresas=Empresa::all();
        $soldador=Soldador::find($id);
        return view("cruds.soldador.edit")->with(["soldador"=>$soldador,"empresas"=>$empresas]);
    }

    public function update(Request $request, $id)
    {
        Soldador::find($id)->update($request->all());
        return redirect()->Route("soldador.index");
    }

    public function destroy(Request $request)
    {
        Soldador::destroy($request->id);
        return redirect("/soldador");

    }
}
