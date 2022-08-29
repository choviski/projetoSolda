<?php

namespace App\Http\Controllers;

use App\Eps;
use App\Norma;
use App\NormaQualificacao;
use App\Processo;
use App\Qualificacao;
use App\Soldador;
use App\Empresa;
use App\SoldadorQualificacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use Carbon\Carbon;
use DateTime;
use File;
use Illuminate\Support\Str;
use Psr\Log\NullLogger;

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
        $soldador= new Soldador();
        $soldador->nome=$request->nome;
        $soldador->cpf=$request->cpf;
        $soldador->criado=1;
        $soldador->sinete=$request->sinete;
        $soldador->matricula=$request->matricula;
        $soldador->email=$request->email;
        $soldador->id_empresa=$request->id_empresa;
        $soldador->save();
        $imagem = $request->file('foto');
        $extensao=$imagem->getClientOriginalExtension();
        chmod($imagem->path(),0755);
        File::move($imagem, public_path().'/imagem-soldador/soldador-id'.$soldador->id.'.'.$extensao);
        $soldador->foto='/imagem-soldador/soldador-id'.$soldador->id.'.'.$extensao;
        $soldador->save();
        return redirect()->Route("soldador.index")->with(["usuario"=>$usuario]);
    }

    public function show($id)
    {
        $usuario = session()->get("Usuario");
        $soldador=Soldador::find($id);
        return view("cruds.soldador.show")->with(["soldador"=>$soldador,"usuario"=>$usuario]);
    }

    public function edit($id, Request $request)
    {
        $usuario = session()->get("Usuario");
        $empresas=Empresa::all();
        $soldador=Soldador::find($id);
        $erro=$request->session()->get("erro");
        return view("cruds.soldador.edit")->with(["soldador"=>$soldador,"empresas"=>$empresas,"usuario"=>$usuario,"erro"=>$erro]);
    }

    public function update(Request $request, $id)
    {
        $usuario = session()->get("Usuario");
        $soldador=Soldador::find($id);
        $soldador->nome=$request->nome;
        $soldador->sinete=$request->sinete;
        $soldador->matricula=$request->matricula;
        $soldador->id_empresa=$request->id_empresa;
        $soldador->criado=1;
        if($request->file('foto')) {
            $imagem = $request->file('foto');
            $extensao = $imagem->getClientOriginalExtension();
            chmod($imagem->path(), 0755);
            File::move($imagem, public_path() . '/imagem-soldador/soldador-id' . $soldador->id . '.' . $extensao);
            $soldador->foto = '/imagem-soldador/soldador-id' . $soldador->id . '.' . $extensao;
        }
        $soldador->save();

        return redirect()->route("paginaInicial")->with(["usuario"=>$usuario]);
    }

    public function destroy(Request $request)
    {
        $usuario = session()->get("Usuario");
        $qualificacaos=SoldadorQualificacao::where("id_soldador","=",$request->id)->get();
        foreach ($qualificacaos as $qualificacao){
            SoldadorQualificacao::destroy($qualificacao->id);
        }
        $soldador=Soldador::find($request->id);
        $soldador->cpf=Str::random(14);
        $soldador->email=null;
        $soldador->save();
        Soldador::destroy($request->id);
        return redirect()->route("paginaInicial")->with(["usuario"=>$usuario]);

    }
    public function selecionarEmpresa(){
        $empresas=Empresa::all();
        $usuario = session()->get("Usuario");
        return view("selecionarEmpresa")->with(["empresas"=>$empresas, "usuario"=>$usuario]);
    }
    public function criar(Request $request){
        $usuario = session()->get("Usuario");
        $erro = $request->session()->get("erro");
        return view("cadastroSoldador")->with(["empresa"=>$request->empresa, "usuario"=>$usuario,"erro"=>$erro]);
    }
    public function salvar(Request $request){
        $soldadores=Soldador::all();
        $lixoCpf =Soldador::onlyTrashed()->where("cpf","=",$request->cpf)->get();
        foreach ($soldadores as $soldador){
            if($soldador->cpf==$request->cpf ||$lixoCpf->isNotEmpty()){
                $request->session()->flash("erro","Já existe um soldador cadastrado com esse CPF.");
                $usuario = session()->get("Usuario");
                $erro = $request->session()->get("erro");
                return view("cadastroSoldador")->with(["empresa"=>$request->id_empresa, "usuario"=>$usuario,"erro"=>$erro]);

            }

        }
        $soldador=new Soldador();
        $soldador->nome=$request->nome;
        $soldador->cpf=$request->cpf;
        $soldador->sinete=$request->sinete;
        $soldador->matricula=$request->matricula;
        $soldador->id_empresa=$request->id_empresa;
        $soldador->criado=1;
        $soldador->save();
        $soldador->email=$soldador->empresa->email;
        if($request->file('foto')) {
            $imagem = $request->file('foto');
            if($imagem->getClientOriginalExtension()=="JPG"){
                $extensao = "jpg";
            }else {
                $extensao = $imagem->getClientOriginalExtension();
            }
            chmod($imagem->path(), 0755);
            File::move($imagem, public_path() . '/imagem-soldador/soldador-id' . $soldador->id . '.' . $extensao);
            $soldador->foto = '/imagem-soldador/soldador-id' . $soldador->id . '.' . $extensao;
        }else{
            $soldador->foto="imagens/soldador_default.png";
        }
        $soldador->save();
        $usuario = session()->get("Usuario");
        $processos=Processo::all();
        $eps=Eps::where("id_empresa","=",$soldador->empresa->id)->get();
        return view("selecionarQualificacoes")->with(["soldador"=>$soldador->id,"usuario"=>$usuario,"processos"=>$processos,"epss"=>$eps]);
    }
    public function novaQualificacao(Request $request){
        $usuario = session()->get("Usuario");
        $processos=Processo::all();
        $soldadorEmpresa=Soldador::find($request->soldador);
        $eps=Eps::where("id_empresa","=",$soldadorEmpresa->empresa->id)->get();
        $soldador=$request->soldador;
        return view("selecionarQualificacoes")->with(["soldador"=>$soldador,"usuario"=>$usuario,"processos"=>$processos,"epss"=>$eps]);
    }

    public function adicionarQualificacao(Request $request){
        $usuario = session()->get("Usuario");

        //cadastrando norma
        $norma=new Norma();
        $norma->nome=$request->nome_norma;
        $norma->descricao=$request->descricao_norma;
        $norma->validade=$request->validade;
        $norma->save();
        //cadastrando qualificacao
        $qualificacao = new Qualificacao();
        $qualificacao->id_processo=$request->id_processo;
        $qualificacao->id_eps=$request->id_eps;
        $qualificacao->descricao=$request->descricao;
        $qualificacao->save();
        //cadastrando norma-qualificacao
        $norma_qualificacao= new NormaQualificacao();
        $norma_qualificacao->id_norma=$norma->id;
        $norma_qualificacao->id_qualificacao=$qualificacao->id;
        $norma_qualificacao->save();
        //cadastrando soldador-Qualificacao
        $soldador_qualificacao= new SoldadorQualificacao();
        $soldador_qualificacao->cod_rqs=$request->cod_rqs;
        $soldador_qualificacao->aviso=1;
        $soldador_qualificacao->id_soldador=$request->id_soldador;
        $soldador_qualificacao->id_qualificacao=$qualificacao->id;
        $soldador_qualificacao->data_qualificacao=$request->data_qualificacao;
        $hoje=now();
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
        $soldador_qualificacao->validade_qualificacao=($validade->addMonth($tempo)->toDateString());
        $soldador_qualificacao->lancamento_qualificacao=Carbon::now()->toDateString();
        $soldador_qualificacao->nome_certificado=$request->nome_certificado;
        $soldador_qualificacao->caminho_certificado=$request->caminho_certificado;
        $datetime1 = new DateTime($validade);
        $datetime2 = new DateTime($hoje);
        $interval = now()->diffInDays(($datetime1), false);
        if($interval<=0) {
            $soldador_qualificacao->status = "atrasado";
        }else{
            $soldador_qualificacao->status="qualificado";
        }
        $soldador_qualificacao->save();

        $certificado = $request->file('caminho_certificado');
        $extensao=$certificado->getClientOriginalExtension();
        chmod($certificado->path(),0755);
        File::move($certificado, public_path().'/certificados/certificado-id'.$soldador_qualificacao->id.'.'.$extensao);
        $soldador_qualificacao->caminho_certificado='/certificados/certificado-id'.$soldador_qualificacao->id.'.'.$extensao;
        
        $soldador_qualificacao->save();
        return view("escolha")->with(["soldador"=>$request->id_soldador,"usuario"=>$usuario]);
    }

    public function inserirQualificacao(Request $request){
        $usuario = session()->get("Usuario");
        $processos=Processo::all();
        return view("selecionarQualificacoes")->with(["soldador"=>"$request->soldador","usuario"=>$usuario,"processos"=>$processos]);
    }

    public function perfilSoldador(Request $request){

        $usuario = session()->get("Usuario");
        $soldador = Soldador::where('id','=',$request->id_soldador)->where("criado","=",1)->first();
        $qualificacoes=SoldadorQualificacao::where('id_soldador','=',$request->id_soldador)->where("criado",1)->get();
        foreach ($qualificacoes as $qualificacao){
            $tempoVencimentoRestante = now()->diffInDays(($qualificacao->validade_qualificacao), false);
            if($tempoVencimentoRestante<=0){
                $qualificacao->status = 'atrasado';
                $qualificacao->save();
            }
        }



        if($request->rota){
            if($request->empresa){
                $rotaAnterior = $request->rota;
                $empresa = $request->empresa;
                return view("perfilSoldador")->with(["usuario" => $usuario, "qualificacoes" => $qualificacoes, "soldador" => $soldador, "rota" => $rotaAnterior, "empresa" => $empresa]);;
            }elseif ($request->rota=="soldadoresFiltrados") {
                $rotaAnterior=$request->rota;
                $nomeSoldador=$request->nomeSoldador;
                return view("perfilSoldador")->with(["usuario"=>$usuario,"qualificacoes"=>$qualificacoes,"soldador"=>$soldador,"rota"=>$rotaAnterior,"nomeSoldador"=>$nomeSoldador]);;

            }
        }
        return view("perfilSoldador")->with(["usuario"=>$usuario,"qualificacoes"=>$qualificacoes,"soldador"=>$soldador]);
    }

    public function listar($id){
        $usuario = session()->get("Usuario");
        $rotaAnterior=Route::getCurrentRoute()->getName();
        if($usuario->tipo==1){
            $soldadores = Soldador::where("id_empresa", "=", $id)->where("criado","=",1)->get();
            return view("soldadorEmpresa")->with(["usuario" => $usuario, "soldadores" => $soldadores,"empresa"=>$id,"rota"=>$rotaAnterior]);
        }else {
            $soldadores = Soldador::where("id_empresa", "=", $id)->where("criado","=",1)->get();
            return view("soldadorEmpresa")->with(["usuario" => $usuario, "soldadores" => $soldadores,"empresa"=>$id]);
        }
    }

    public function listarFiltrado(Request $request){
        $usuario = session()->get("Usuario");
        $rotaAnterior=Route::getCurrentRoute()->getName();
        $nomeSoldador=$request->nomeSoldador;
        if($usuario->tipo==1){
            $soldadores = Soldador::where('nome','like','%'.$request->nomeSoldador.'%')->where("criado","=",1)->get();
            return view("listarSoldadores")->with(["usuario"=>$usuario,"soldadores"=>$soldadores,"rota"=>$rotaAnterior,"nomeSoldador"=>$nomeSoldador]);
        }else{
            $empresa=Empresa::where('id_usuario','=',$usuario->id)->first();
            $soldadores = Soldador::where('nome','like','%'.$request->nomeSoldador.'%')->where('id_empresa','=',$empresa->id)->where("criado","=",1)->get();
            return view("listarSoldadores")->with(["usuario"=>$usuario,"soldadores"=>$soldadores,"empresa"=>$empresa->id,"rota"=>$rotaAnterior,"nomeSoldador"=>$nomeSoldador]);
        }

    }

}
