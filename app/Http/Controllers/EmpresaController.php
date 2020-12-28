<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Empresa;
use App\Endereco;
use App\Http\Controllers\Controller;
use App\Inspetor;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = session()->get("Usuario");
        $empresas=Empresa::all();
        return view("cruds.empresa.index")->with(["empresas"=>$empresas,"usuario"=>$usuario]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario = session()->get("Usuario");
        $enderecos=Endereco::all();
        $inspetors=Inspetor::all();
        return view("cruds.empresa.create")->with(["enderecos"=>$enderecos,"inspetors"=>$inspetors,"usuario"=>$usuario]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = session()->get("Usuario");
        Empresa::create($request->all());
        return redirect()->route("empresa.index")->with(["usuario"=>$usuario]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = session()->get("Usuario");
        $empresa=Empresa::find($id);
        return view("cruds.empresa.show")->with(["empresa"=>$empresa,"usuario"=>$usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = session()->get("Usuario");
        $enderecos=Endereco::all();
        $inspetors=Inspetor::all();
        $empresa=Empresa::find($id);
        return view("cruds.empresa.edit")->with(["empresa"=>$empresa,"enderecos"=>$enderecos,"inspetors"=>$inspetors,"usuario"=>$usuario]);
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
        $usuario = session()->get("Usuario");
        Empresa::find($id)->update($request->all());
        return redirect()->route("empresa.index")->with(["usuario"=>$usuario]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Empresa::destroy($request->id);
        return redirect()->route("empresa.index");
    }
    public function salvar(Request $request){
        $usuario = session()->get("Usuario");
        Empresa::create($request->all());
        return redirect()->route("paginaInicial")->with(["usuario"=>$usuario]);
    }
    public function selecionar(){
        $enderecos=Endereco::all();
        $inspetor=Inspetor::all();
        $usuario = session()->get("Usuario");
        return view("cadastroEmpresa")->with(["enderecos"=>$enderecos,"inspetors"=>$inspetor,"usuario"=>$usuario]);

    }
}
