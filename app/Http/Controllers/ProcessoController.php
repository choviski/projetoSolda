<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Processo;
use Illuminate\Http\Request;

class ProcessoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processos = Processo::all();
        return view("cruds.processo.index")->with(["processos"=>$processos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("cruds.processo.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Processo::create($request->all());
        return redirect()->route("processo.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $processo = Processo::find($id);
        return view ("cruds.processo.show")->with(["processo"=>$processo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $processo = Processo::find($id);
        return view ("cruds.processo.edit")->with(["processo"=>$processo]);
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
        Processo::find($id)->update($request->all());
        return redirect()->route("processo.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Processo::destroy($request->id);
        return redirect("/processo");
    }
}
