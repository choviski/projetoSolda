<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Inspetor;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class InspetorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inspetores=Inspetor::all();
        return view("cruds.inspetor.index")->with(["inspetores"=>$inspetores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("cruds.inspetor.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Inspetor::create($request->all());
        return redirect()->route("inspetor.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inspetor = Inspetor::find($id);
        return view("cruds.inspetor.show")->with(["inspetor"=>$inspetor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inspetor = Inspetor::find($id);
        return view("cruds.inspetor.edit")->with(["inspetor"=>$inspetor]);
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
        Inspetor::find($id)->update($request->all());
        return redirect()->route("inspetor.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Inspetor::destroy($request->id);
        return redirect("/inspetor");
    }
}
