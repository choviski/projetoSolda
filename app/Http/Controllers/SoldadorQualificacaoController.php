<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Eps;
use App\Norma;
use App\NormaQualificacao;
use App\Processo;
use App\SoldadorQualificacao;
use App\Soldador;
use App\Qualificacao;
use App\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;
use DateTime;

class SoldadorQualificacaoController extends Controller
{
    public function index()
    {
        $usuario = session()->get("Usuario");
        $soldadorqualificacaos = SoldadorQualificacao::all();

        return view("cruds.soldadorqualificacao.index")->with(["soldadorqualificacaos"=>$soldadorqualificacaos,"usuario"=>$usuario]);
    }

    public function create()
    {
        $usuario = session()->get("Usuario");
        $qualificoes=Qualificacao::all();
        $soldadors=soldador::all();
        return view("cruds.soldadorqualificacao.create")->with(["qualificaos"=>$qualificoes,"soldadors"=>$soldadors,"usuario"=>$usuario]);
    }

    public function store(Request $request)
    {
        $usuario = session()->get("Usuario");
        SoldadorQualificacao::create($request->all());
        return redirect()->Route("soldadorqualificacao.index")->with(["usuario"=>$usuario,"usuario"=>$usuario]);
    }

    public function show($id)
    {
        $usuario = session()->get("Usuario");
        $soldadorqualificacao=SoldadorQualificacao::find($id);
        return view("cruds.soldadorqualificacao.show")->with(["soldadorqualificacao"=>$soldadorqualificacao,"usuario"=>$usuario]);
    }

    public function edit($id)
    {
        $usuario = session()->get("Usuario");
        $qualificoes=Qualificacao::all();
        $soldadors=soldador::all();
        $soldadorqualificacao = SoldadorQualificacao::find($id);
        return view("cruds.soldadorqualificacao.edit")->with(["qualificaos"=>$qualificoes,"soldadors"=>$soldadors,"soldadorqualificacao"=>$soldadorqualificacao,"usuario"=>$usuario]);
    }

    public function update(Request $request, $id)
    {
       
        $usuario = session()->get("Usuario");
        SoldadorQualificacao::find($id)->update($request->all());
        return redirect()->Route("soldadorqualificacao.index")->with(["usuario"=>$usuario]);
    }

    public function destroy(Request $request)
    {
        SoldadorQualificacao::destroy($request->id);
        $empresas = Empresa::orderBy("razao_social")->get();
        $usuario=session()->get("Usuario");
        return view("listarEmpresas")->with(["usuario"=>$usuario,"empresas"=>$empresas]);

    }
    public function editar($id)
    {
        $processos=Processo::all();
        $soldadorQualificacao=SoldadorQualificacao::find($id);
        $qualificacao=Qualificacao::find($soldadorQualificacao->id_qualificacao);
        $soldador=Soldador::find($soldadorQualificacao->id_soldador);
        $eps=Eps::where("id_empresa","=",$soldador->empresa->id)->get();
        $normaQualificacao=NormaQualificacao::where("id_qualificacao","=",$qualificacao->id)->orderBy("created_at","desc")->first();
        $norma=Norma::find($normaQualificacao->norma_id);
        $usuario=session()->get("Usuario");
        return view("editarQualificacao")->with(["processos"=>$processos,"soldadorQualificacao"=>$soldadorQualificacao,"epss"=>$eps,"norma"=>$norma,"usuario"=>$usuario]);

    }
    public function atualizar(Request $request){
        $soldadorQualificacao=SoldadorQualificacao::find($request->id);
        $soldadorQualificacao->cod_rqs=$request->cod_rqs;
        $soldadorQualificacao->data_qualificacao=$request->data_qualificacao;

        if($request->validade==1){
            $tempo=6;
        }elseif ($request->validade==2){
            $tempo=12;
        }elseif ($request->validade==3){
            $tempo=24;
        }elseif ($request->validade==4){
            $tempo=36;
        }
        $validade=Carbon::parse($request->data_qualificacao);
        $soldadorQualificacao->validade_qualificacao=($validade->addMonth($tempo)->toDateString());
        $datetime1 = new DateTime($validade);
        $interval = now()->diffInDays(($datetime1), false);
        if($interval<=0) {
            $soldadorQualificacao->status = "atrasado";
        }else{
            $soldadorQualificacao->status="qualificado";
        }
        $soldadorQualificacao->save();
        $qualificacao=Qualificacao::find($soldadorQualificacao->qualificacao->id);
        $qualificacao->id_processo=$request->id_processo;
        $qualificacao->id_eps=$request->id_eps;
        $qualificacao->descricao=$request->descricao;
        $qualificacao->save();
        $norma=Norma::find($qualificacao->norma->norma->id);
        $norma->nome=$request->nome_norma;
        $norma->descricao=$request->descricao_norma;
        $norma->validade=$request->validade;
        $norma->save();
        $usuario=session()->get("Usuario");
        $empresas = Empresa::orderBy('razao_social')->get();
        return view("listarEmpresas")->with(["usuario"=>$usuario,"empresas"=>$empresas]);

    }
}
