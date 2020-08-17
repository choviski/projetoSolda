<?php

namespace App\Http\Controllers;

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
        $empresas=Empresa::all();
        return view("cruds.empresa.index")->with(["empresas"=>$empresas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enderecos=Endereco::all();
        $inspetors=Inspetor::all();
        return view("cruds.empresa.create")->with(["enderecos"=>$enderecos,"inspetors"=>$inspetors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Empresa::create($request->all());
        return redirect()->route("empresa.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa=Empresa::find($id);
        return view("cruds.empresa.show")->with(["empresa"=>$empresa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enderecos=Endereco::all();
        $inspetors=Inspetor::all();
        $empresa=Empresa::find($id);
        return view("cruds.empresa.edit")->with(["empresa"=>$empresa,"enderecos"=>$enderecos,"inspetors"=>$inspetors]);
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
        Empresa::find($id)->update($request->all());
        return redirect()->route("empresa.index");
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
}
