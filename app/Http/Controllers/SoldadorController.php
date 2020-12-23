<?php

namespace App\Http\Controllers;

use App\Soldador;
use App\Empresa;
use Illuminate\Http\Request;

class SoldadorController extends Controller
{
    public function index()
    {
        $usuario = session()->get("Usuario");
        $soldador = Soldador::all();
        return view("cruds.soldador.index")->with(["soldadors"=>$soldador,"usuario"=>$usuario]);
    }

    public function create()
    {
        $usuario = session()->get("Usuario");
        $empresas=Empresa::all();
        return view("cruds.soldador.create")->with(["empresas"=>$empresas,"usuario"=>$usuario]);
    }

    public function store(Request $request)
    {
        $usuario = session()->get("Usuario");
        Soldador::create($request->all());
        return redirect()->Route("soldador.index")->with(["usuario"=>$usuario]);
    }

    public function show($id)
    {
        $usuario = session()->get("Usuario");
        $soldador=Soldador::find($id);
        return view("cruds.soldador.show")->with(["soldador"=>$soldador,"usuario"=>$usuario]);
    }

    public function edit($id)
    {
        $usuario = session()->get("Usuario");
        $empresas=Empresa::all();
        $soldador=Soldador::find($id);
        return view("cruds.soldador.edit")->with(["soldador"=>$soldador,"empresas"=>$empresas,"usuario"=>$usuario]);
    }

    public function update(Request $request, $id)
    {
        $usuario = session()->get("Usuario");
        Soldador::find($id)->update($request->all());
        return redirect()->Route("soldador.index")->with(["usuario"=>$usuario]);
    }

    public function destroy(Request $request)
    {
        $usuario = session()->get("Usuario");
        Soldador::destroy($request->id);
        return redirect("/soldador");

    }
}
