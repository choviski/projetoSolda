<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Http\Controllers\Controller;
use App\Norma;
use Illuminate\Http\Request;

class NormaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $normas = Norma::all();
        return view("cruds.norma.index")->with(["normas"=>$normas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
        {
        return view("cruds.norma.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Norma::create($request->all());
        return redirect()->route("norma.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $norma=Norma::find($id);
        return view("cruds.norma.show")->with(["norma"=>$norma]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $norma=Norma::find($id);
        return view("cruds.norma.edit")->with(["norma"=>$norma]);
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
        Norma::find($id)->update($request->all());
        return redirect()->route("norma.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Norma::destroy($request->id);
        return redirect("/norma");
    }
}
