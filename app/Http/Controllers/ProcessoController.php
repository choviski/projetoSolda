<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Processo;
use Illuminate\Http\Request;

class ProcessoController extends Controller
{

    public function index()
    {
        $usuario = session()->get("Usuario");
        $processos = Processo::all();
        return view("cruds.processo.index")->with(["processos"=>$processos,"usuario"=>$usuario]);
    }

    public function create()
    {
        $usuario = session()->get("Usuario");
        return view("cruds.processo.create")->with(["usuario"=>$usuario]);;
    }

    public function store(Request $request)
    {
        $usuario = session()->get("Usuario");
        Processo::create($request->all());
        return redirect()->route("processo.index")->with(["usuario"=>$usuario]);;
    }


    public function show($id)
    {
        $usuario = session()->get("Usuario");
        $processo = Processo::find($id);
        return view ("cruds.processo.show")->with(["processo"=>$processo,"usuario"=>$usuario]);
    }

    public function edit($id)
    {
        $usuario = session()->get("Usuario");
        $processo = Processo::find($id);
        return view ("cruds.processo.edit")->with(["processo"=>$processo,"usuario"=>$usuario]);
    }

    public function update(Request $request, $id)
    {
        $usuario = session()->get("Usuario");
        Processo::find($id)->update($request->all());
        return redirect()->route("processo.index")->with(["usuario"=>$usuario]);;
    }

    public function destroy(Request $request)
    {
        $usuario = session()->get("Usuario");
        Processo::destroy($request->id);
        return redirect("/processo");
    }
}
