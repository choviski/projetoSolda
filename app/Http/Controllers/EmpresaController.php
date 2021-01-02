<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Empresa;
use App\Endereco;
use App\Http\Controllers\Controller;
use App\Inspetor;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

        #Criando a Empresa
        $empresa = new Empresa();
        $empresa->cnpj=$request->cnpj;
        $empresa->nome_fantasia=$request->nome_fantasia;
        $empresa->razao_social=$request->razao_social;
        $empresa->telefone=$request->telefone;
        $empresa->email=$request->email;
        $empresa->id_endereco=$request->id_endereco;
        $empresa->id_inspetor=$request->id_inspetor;

        #Criando o usuario da empresa
        #senha aleatoria
        $senhaAleatoria = Str::random(12);
        $novoUsuario = new Usuario();
        $novoUsuario->nome=$request->nome_fantasia;
        $novoUsuario->email=$request->email;
        $novoUsuario->senha=$senhaAleatoria;
        $novoUsuario->tipo=2;
        $novoUsuario->save();

        #Associando o Usuario a Empresa.
        $empresa->id_usuario=$novoUsuario->id;
        $empresa->save();

        return redirect()->route("paginaInicial")->with(["usuario"=>$usuario]);
    }

    public function editarUsuario()
    {
        $usuario=session()->get("Usuario");
        $empresa=Empresa::where('id_usuario','=',$usuario->id)->get();
        $usuarioEmpresa=Usuario::find($usuario->id);
        $enderecos=Endereco::all();
        $inspetors=Inspetor::all();

        return view("editarUsuario")->with(["usuario"=>$usuario,"usuarioEmpresa"=>$usuarioEmpresa,"enderecos"=>$enderecos,"inspetors"=>$inspetors,"empresa"=>$empresa[0]]);
    }

    public function salvarUsuario($id,Request $request){
        $usuario=session()->get("Usuario");
        $empresa=Empresa::find($id);
        #$empresa->cnpj=$request->cnpj; Comentado pq n tem como mudar o cnpj
        $empresa->nome_fantasia=$request->nome_fantasia;
        $empresa->razao_social=$request->razao_social;
        $empresa->telefone=$request->telefone;
        $empresa->email=$request->email;
        $empresa->id_endereco=$request->id_endereco;
        $empresa->id_inspetor=$request->id_inspetor;
        $usuarioEmpresa=Usuario::find($empresa->id_usuario);
        $usuarioEmpresa->senha = $request->senha;
        $empresa->update();
        $usuarioEmpresa->update();

        return redirect()->route("paginaInicial")->with(["usuario"=>$usuario]);
        
    }

    public function selecionar(){
        $enderecos=Endereco::all();
        $inspetor=Inspetor::all();
        $usuario = session()->get("Usuario");
        return view("cadastroEmpresa")->with(["enderecos"=>$enderecos,"inspetors"=>$inspetor,"usuario"=>$usuario]);

    }
}
