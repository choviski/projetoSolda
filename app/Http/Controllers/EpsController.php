<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Eps;
use Illuminate\Http\Request;

class EpsController extends Controller
{
    public function create(){
        $usuario=session()->get("Usuario");
        $empresas = Empresa::all();
        return view("cadastroEps")->with(["empresas"=>$empresas,"usuario"=>$usuario]);
    }
    public function store(Request $request){
        Eps::create($request->all());
        $usuario = session()->get("Usuario");
        $empresas = Empresa::orderBy('razao_social')->get();
        return view("listarEmpresas")->with(["usuario"=>$usuario,"empresas"=>$empresas]);
    }
    public function destroy(Request $request){
        Eps::destroy($request->id);
        $usuario = session()->get("Usuario");
        $empresas = Empresa::orderBy('razao_social')->get();
        return view("listarEmpresas")->with(["usuario"=>$usuario,"empresas"=>$empresas]);
    }
}
