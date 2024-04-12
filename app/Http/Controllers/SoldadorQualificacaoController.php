<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Eps;
use App\EpsAvancada;
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
        $termo = $request->filtro;
        $SoldadorQualificacao::destroy($request->id);
        $empresas = Empresa::orderBy("razao_social")->paginate(10);
        $usuario=session()->get("Usuario");
        return view("listarEmpresas")->with(["usuario"=>$usuario,"termo"=>$termo,"empresas"=>$empresas]);

    }
    public function editar($id)
    {
        $usuario=session()->get("Usuario");
        $processos=Processo::all();
        $soldadorQualificacao=SoldadorQualificacao::find($id);
        $qualificacao=Qualificacao::find($soldadorQualificacao->id_qualificacao);
        $soldador=Soldador::find($soldadorQualificacao->id_soldador);
        $eps=Eps::where("id_empresa","=",$soldador->empresa->id)->get();
        $epsAvancadas=EpsAvancada::where("id_empresa","=",$soldador->empresa->id)->get();
        $normaQualificacao=NormaQualificacao::where("id_qualificacao","=",$qualificacao->id)->orderBy("created_at","desc")->first();
        $norma=Norma::find($normaQualificacao->norma_id);
        if(get_class($qualificacao->eps)=="App\Eps"){
            $tipoEps="Normal";
        }else{
            $tipoEps="Avançada";
        }
        return view("editarQualificacao")->with(
            ["processos"=>$processos,
            "soldadorQualificacao"=>$soldadorQualificacao,
            "epss"=>$eps,
            "norma"=>$norma,
            "usuario"=>$usuario,
            "epsAvancadas"=>$epsAvancadas,
            "tipoEps"=>$tipoEps]
        );

    }
    public function atualizar(Request $request){
        $termo = $request->filtro;
        $soldadorQualificacao=SoldadorQualificacao::find($request->id);
        $soldadorQualificacao->cod_rqs=$request->cod_rqs;
        $soldadorQualificacao->data_qualificacao=$request->data_qualificacao;
        $tempo=$request->validade;
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
        // Muita atenção aqui! Por enquanto, só tem como cadastrar eps Avançada 
        // com processo TIG, então vai ficar hard-coded. Posteriormente precisamos
        // dar um jeito de vincular o $epsAvancada->$processos[0]->qual_tipo com o $processos->nome  
        if($request->tipo_eps=='Avançada'){
            $qualificacao->tipo_eps='App\EpsAvancada';
            $idProcessoTIG = Processo::select('id')->where('descricao', 'TIG')->first();
            $qualificacao->id_processo=$idProcessoTIG->id;
        }else{
            $qualificacao->tipo_eps='App\Eps';
            $qualificacao->id_processo=$request->id_processo;
        }
        $qualificacao->save();
        $norma=Norma::find($qualificacao->norma->norma->id);
        $norma->nome=$request->nome_norma;
        $norma->descricao=$request->descricao_norma;
        $norma->validade=$request->validade;
        $norma->save();
        $usuario=session()->get("Usuario");
        $empresas = Empresa::orderBy('razao_social')->paginate(10);
        return redirect()->Route('paginaInicial')->with(["usuario"=>$usuario,"empresas"=>$empresas,"termo"=>$termo]);

    }
}
