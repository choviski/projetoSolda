<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Empresa;
use App\Endereco;
use App\Http\Controllers\Controller;
use App\Inspetor;
use App\Soldador;
use App\SoldadorQualificacao;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;
use File;


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
    public function edit($id, Request $request)
    {
        $usuario = session()->get("Usuario");
        $enderecos=Endereco::all();
        $inspetors=Inspetor::all();
        $cidades=Cidade::all();
        $empresa=Empresa::find($id);
        $erro=$request->session()->get("erro");
        return view("cruds.empresa.edit")->with(["empresa"=>$empresa,"enderecos"=>$enderecos,"inspetors"=>$inspetors,"usuario"=>$usuario,"cidades"=>$cidades,"erro"=>$erro]);
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
        $empresa = Empresa::find($id);
        $empresas=Empresa::all();
        $usuarios=Usuario::all();
        $lixoEmail=Empresa::onlyTrashed()->where("email","=",$request->email)->get();
        $lixoEmail2=Usuario::onlyTrashed()->where("email","=",$request->email)->get();
        foreach ($empresas as $empres){
            if($empres->email==$request->email && $empres->id != $id || $lixoEmail->isNotEmpty()){
                $request->session()->flash("erro","Já existe uma empresa cadastrada com esse email.");
                return redirect()->back();

            }
        }
        foreach ($usuarios as $usu){
            if($usu->empresa) {
                if ($usu->email == $request->email && $usu->empresa->id != $id || $lixoEmail2->isNotEmpty()) {
                    $request->session()->flash("erro", "Já existe uma empresa cadastrada com esse email.");
                    return redirect()->back();

                }
            }else{
                if ($usu->email == $request->email || $lixoEmail2->isNotEmpty()) {
                    $request->session()->flash("erro", "Já existe uma empresa cadastrada com esse email.");
                    return redirect()->back();

                }
            }
        }
        $endereco= new Endereco();
        $endereco->rua=$request->rua;
        $endereco->cep=$request->cep;
        $endereco->complemento=$request->complemento;
        $endereco->bairro=$request->bairro;
        $endereco->numero=$request->numero;
        $endereco->id_cidade=$request->id_cidade;
        $endereco->save();
        $empresa->cnpj=$empresa->cnpj;
        $empresa->nome_fantasia=$request->nome_fantasia;
        $empresa->razao_social=$empresa->razao_social;
        $empresa->celular=$request->celular;
        $empresa->telefone=$request->telefone;
        $empresa->email=$request->email;
        $empresa->id_endereco=$endereco->id;
        $usuario=Usuario::find($request->id_usuario);
        $usuario->email=$request->email;
        $usuario->senha=$request->senha;
        $usuario->update();
        if($request->nome&&$request->crea&&$request->funcao){
            try {
                $inspetor = new Inspetor();
                $inspetor->nome = $request->nome;
                $inspetor->crea = $request->crea;
                $inspetor->funcao = $request->funcao;
                $inspetor->save();
                $empresa->id_inspetor = $inspetor->id;
            }catch (Exception $e){
                session()->put("sem_inspetor","Preencha todos os dados do seu endereço corretamente");
                return redirect()->back();
            }
        }else{
            $empresa->id_inspetor=$request->id_inspetor;
        }
        if($request->file('foto')) {
            $imagem = $request->file('foto');
            if($imagem->getClientOriginalExtension()=="JPG"){
                $extensao = "jpg";
            }else {
                $extensao = $imagem->getClientOriginalExtension();
            }
            chmod($imagem->path(), 0755);
            File::move($imagem, public_path() . '/imagem-empresa/empresa-id' . $empresa->id . '.' . $extensao);
            $empresa->foto = '/imagem-empresa/empresa-id' . $empresa->id . '.' . $extensao;
        }else{
            $empresa->foto="imagens/empresa_default.png";
        }
        $empresa->update();

        return redirect()->route("paginaInicial")->with(["usuario"=>$usuario]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $empresa=Empresa::find($request->id);
        $empresa->cnpj=Str::random(18);
        $empresa->email=Str::random(20);
        $empresa->save();
        $soldadores=Soldador::where("id_empresa","=",$empresa->id)->get();
        foreach ($soldadores as $soldador){
            $qualificacaos=SoldadorQualificacao::where("id_soldador","=",$soldador->id)->get();
            foreach ($qualificacaos as $qualificacao){
                SoldadorQualificacao::destroy($qualificacao->id);
            }
            $soldador=Soldador::find($soldador->id);
            $soldador->cpf=Str::random(14);
            $soldador->email=Str::random(20);
            $soldador->save();
            Soldador::destroy($soldador->id);
        }
        Empresa::destroy($request->id);
        Endereco::destroy($empresa->id_endereco);
        $usuario=Usuario::find($empresa->id_usuario);
        $usuario->email=Str::random(20);
        $usuario->save();
        Usuario::destroy($empresa->id_usuario);
        return redirect()->back();
    }
    public function salvar(Request $request){
        $usuario = session()->get("Usuario");
        #Criando o Endereco
        $empresas=Empresa::all();
        $lixoCnpj =Empresa::onlyTrashed()->where("cnpj","=",$request->cnpj)->get();
        $lixoEmail =Empresa::onlyTrashed()->where("email","=",$request->email)->get();
        foreach ($empresas as $empresa){
            if($empresa->email==$request->email || $lixoEmail->isNotEmpty()){
                $request->session()->flash("erro","Já existe uma empresa cadastrada com esse email.");
                return redirect()->back();

            }
            if($empresa->cnpj==$request->cnpj || $lixoCnpj->isNotEmpty()){
                $request->session()->flash("erro","Já existe uma empresa cadastrada com esse CNPJ.");
                return redirect()->back();

            }

        }
        $endereco= new Endereco();
        $endereco->rua=$request->rua;
        $endereco->cep=$request->cep;
        $endereco->complemento=$request->complemento;
        $endereco->bairro=$request->bairro;
        $endereco->numero=$request->numero;
        $endereco->id_cidade=$request->id_cidade;
        $endereco->save();
        #Criando a Empresa
        $empresa = new Empresa();
        $empresa->cnpj=$request->cnpj;
        $empresa->nome_fantasia=$request->nome_fantasia;
        $empresa->razao_social=$request->razao_social;
        $empresa->celular=$request->celular;
        $empresa->telefone=$request->telefone;
        $empresa->email=$request->email;
        $empresa->id_endereco=$endereco->id;
        if($request->nome&&$request->crea&&$request->funcao){
            try {
                $inspetor = new Inspetor();
                $inspetor->nome = $request->nome;
                $inspetor->crea = $request->crea;
                $inspetor->funcao = $request->funcao;
                $inspetor->save();
                $empresa->id_inspetor = $inspetor->id;
            }catch (Exception $e){
                session()->put("sem_inspetor","Preencha todos os dados do seu endereço corretamente");
                return redirect()->back();
            }
        }else{
            $empresa->id_inspetor=$request->id_inspetor;
        }
        #Criando o usuario da empresa
        #senha aleatoria
        $novoUsuario = new Usuario();
        $novoUsuario->nome=$request->razao_social;
        $novoUsuario->email=$request->email;
        $novoUsuario->senha=$request->senha;
        $novoUsuario->tipo=2;
        $novoUsuario->save();

        #Associando o Usuario a Empresa.
        $empresa->id_usuario=$novoUsuario->id;
        $empresa->save();
        if($request->file('foto')) {
            $imagem = $request->file('foto');
            if($imagem->getClientOriginalExtension()=="JPG"){
                $extensao = "jpg";
            }else {
                $extensao = $imagem->getClientOriginalExtension();
            }
            chmod($imagem->path(), 0755);
            File::move($imagem, public_path() . '/imagem-empresa/empresa-id' . $empresa->id . '.' . $extensao);
            $empresa->foto = '/imagem-empresa/empresa-id' . $empresa->id . '.' . $extensao;
        }else{
            $empresa->foto="imagens/empresa_default.png";
        }
        $empresa->save();

        return redirect()->route("email2",['id'=> $novoUsuario->id]);
        return redirect()->route("paginaInicial")->with(["usuario"=>$usuario]);
    }

    public function editarUsuario(Request $request)
    {
        $usuario=session()->get("Usuario");
        $empresa=Empresa::where('id_usuario','=',$usuario->id)->first();
        $usuarioEmpresa=Usuario::find($usuario->id);
        $enderecos=Endereco::all();
        $inspetors=Inspetor::all();
        $erro = $request->session()->get("erro");

        return view("editarUsuario")->with(["usuario"=>$usuario,"usuarioEmpresa"=>$usuarioEmpresa,"enderecos"=>$enderecos,"inspetors"=>$inspetors,"empresa"=>$empresa,"erro"=>$erro]);
    }

    public function salvarUsuario($id,Request $request){
        $usuario=session()->get("Usuario");
        $empresa=Empresa::find($id);
        #$empresa->cnpj=$request->cnpj; Comentado pq n tem como mudar o cnpj
        $empresa->nome_fantasia=$request->nome_fantasia;
        $empresa->razao_social=$request->razao_social;
        $empresa->telefone=$request->telefone;
        $lixoEmail =Empresa::onlyTrashed()->where("email","=",$request->email)->get();
        $empresas=Empresa::all();
        foreach ($empresas as $empres) {
            if ($empres->email == $request->email && $empres->id != $empresa->id || $lixoEmail->isNotEmpty()) {
                $request->session()->flash("erro", "Já existe um usuario cadastrado com esse email.");
                return redirect()->back();
            }
        }
        $empresa->email=$request->email;
        $empresa->id_endereco=$request->id_endereco;
        $empresa->id_inspetor=$request->id_inspetor;
        $usuarioEmpresa=Usuario::find($empresa->id_usuario);
        $usuarioEmpresa->senha = $request->senha;
        $empresa->update();
        $usuarioEmpresa->update();

        return redirect()->route("paginaInicial")->with(["usuario"=>$usuario]);
        
    }

    public function selecionar(Request $request){
        $erro = $request->session()->get("erro");
        $enderecos=Cidade::all();
        $inspetor=Inspetor::all();
        $usuario = session()->get("Usuario");
 
        $senhaAleatoria = Str::random(12);
        return view("cadastroEmpresa")->with(["cidades"=>$enderecos,"inspetors"=>$inspetor,"usuario"=>$usuario,"senha"=>$senhaAleatoria,"erro"=>$erro]);

    }
}
