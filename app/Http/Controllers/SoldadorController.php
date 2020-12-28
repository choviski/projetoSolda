<?php

namespace App\Http\Controllers;

use App\Norma;
use App\NormaQualificacao;
use App\Processo;
use App\Qualificacao;
use App\Soldador;
use App\Empresa;
use App\SoldadorQualificacao;
use Illuminate\Http\Request;

class SoldadorController extends Controller
{
    public function index()
    {
        $usuario = session()->get("Usuario");
        $soldador = Soldador::all();
        return view("cruds.soldador.index")->with(["soldadors"=>$soldador,"usuario"=>$usuario]);
    }

    public function create()
    {
        $usuario = session()->get("Usuario");
        $empresas=Empresa::all();
        return view("cruds.soldador.create")->with(["empresas"=>$empresas,"usuario"=>$usuario]);
    }

    public function store(Request $request)
    {
        $usuario = session()->get("Usuario");
        Soldador::create($request->all());
        return redirect()->Route("soldador.index")->with(["usuario"=>$usuario]);
    }

    public function show($id)
    {
        $usuario = session()->get("Usuario");
        $soldador=Soldador::find($id);
        return view("cruds.soldador.show")->with(["soldador"=>$soldador,"usuario"=>$usuario]);
    }

    public function edit($id)
    {
        $usuario = session()->get("Usuario");
        $empresas=Empresa::all();
        $soldador=Soldador::find($id);
        return view("cruds.soldador.edit")->with(["soldador"=>$soldador,"empresas"=>$empresas,"usuario"=>$usuario]);
    }

    public function update(Request $request, $id)
    {
        $usuario = session()->get("Usuario");
        Soldador::find($id)->update($request->all());
        return redirect()->Route("soldador.index")->with(["usuario"=>$usuario]);
    }

    public function destroy(Request $request)
    {
        $usuario = session()->get("Usuario");
        Soldador::destroy($request->id);
        return redirect("/soldador");

    }
    public function selecionarEmpresa(){
        $empresas=Empresa::all();
        $usuario = session()->get("Usuario");
        return view("selecionarEmpresa")->with(["empresas"=>$empresas, "usuario"=>$usuario]);
    }
    public function criar(Request $request){
        $usuario = session()->get("Usuario");
        return view("cadastroSoldador")->with(["empresa"=>$request->empresa, "usuario"=>$usuario]);
    }
    public function salvar(Request $request){
        $soldador=Soldador::create($request->all());
        $usuario = session()->get("Usuario");
        $processos=Processo::all();
        return view("selecionarQualificacoes")->with(["soldador"=>$soldador->id,"usuario"=>$usuario,"processos"=>$processos]);
    }

    public function adicionarQualificacao(Request $request){
        $usuario = session()->get("Usuario");

        //cadastrando norma
        $norma=new Norma();
        $norma->nome=$request->nome_norma;
        $norma->descricao=$request->descricao_norma;
        $norma->save();
        //cadastrando qualificacao
        $qualificacao = new Qualificacao();
        $qualificacao->id_processo=$request->id_processo;
        $qualificacao->cod_eps=$request->cod_eps;
        $qualificacao->descricao=$request->descricao;
        $qualificacao->save();
        //cadastrando norma-qualificacao
        $norma_qualificacao= new NormaQualificacao();
        $norma_qualificacao->id_norma=$norma->id;
        $norma_qualificacao->id_qualificacao=$qualificacao->id;
        //cadastrando soldador-Qualificacao
        $soldador_qualificacao= new SoldadorQualificacao();
        $soldador_qualificacao->cod_rqs=$request->cod_rqs;
        $soldador_qualificacao->id_soldador=$request->id_soldador;
        $soldador_qualificacao->id_qualificacao=$qualificacao->id;
        $soldador_qualificacao->data_qualificacao=$request->data_qualificacao;
        $soldador_qualificacao->status=$request->status;
        $soldador_qualificacao->validade_qualificacao=$request->validade_qualificacao;
        $soldador_qualificacao->lancamento_qualificacao=$request->lancamento_qualificacao;
        $soldador_qualificacao->nome_certificado=$request->nome_certificado;
        $soldador_qualificacao->caminho_certificado=$request->caminho_certificado;
        $soldador_qualificacao->save();
        return view("escolha")->with(["soldador"=>$request->id_soldador,"usuario"=>$usuario]);
    }
    public function inserirQualificacao(Request $request){
        $usuario = session()->get("Usuario");
        $processos=Processo::all();
        return view("selecionarQualificacoes")->with(["soldador"=>"$request->soldador","usuario"=>$usuario,"processos"=>$processos]);
    }

}