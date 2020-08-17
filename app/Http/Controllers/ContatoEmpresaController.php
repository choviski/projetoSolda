<?php

namespace App\Http\Controllers;

use App\Contato;
use App\Empresa;
use App\EmpresaContato;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContatoEmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contatoEmpresas=EmpresaContato::all();
        return view("cruds.contatoEmpresa.index")->with(["contatoEmpresas"=>$contatoEmpresas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contatos=Contato::all();
        $empresa=Empresa::all();
        return view("cruds.contatoEmpresa.create")->with(["contatos"=>$contatos,"empresas"=>$empresa]);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EmpresaContato::create($request->all());
        return redirect()->route("contatoEmpresa.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $contatoEmpresa=EmpresaContato::find($id);
        return view("cruds.contatoEmpresa.show")->with(["contatoEmpresa"=>$contatoEmpresa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contatos=Contato::all();
        $empresas=Empresa::all();
        $contatoEmpresa=EmpresaContato::find($id);
        return view("cruds.contatoEmpresa.edit")->with(["contatoEmpresa"=>$contatoEmpresa,"contatos"=>$contatos,"empresas"=>$empresas]);
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
        EmpresaContato::find($id)->update($request->all());
        return redirect()->route("contatoEmpresa.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        EmpresaContato::destroy($request->id);
        return redirect("/contatoEmpresa");
    }
}
