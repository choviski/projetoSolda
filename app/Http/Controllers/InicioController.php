<?php

namespace App\Http\Controllers;

use App\Certificado;
use App\Foto;
use App\Empresa;
use App\Publicacao;
use App\Soldador;
use App\Norma;
use App\Qualificacao;
use App\NormaQualificacao;
use App\Processo;
use App\Eps;
use App\Arquivo;
use App\SoldadorQualificacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Carbon\Carbon;
use File;
use DateTime;

class InicioController extends Controller
{
    public function inicio(Request $request)
    {
        $usuario = session()->get("Usuario");
        #Pegando todos os soldadores como administrador
        if($usuario->tipo==1){
            $soldadorqualificacaos = SoldadorQualificacao::where('status','!=','qualificado')->select()->orderBy('status','desc')->get();
            $i=SoldadorQualificacao::all()->count();
            $a=0;
            $soldadorqualificacaose=SoldadorQualificacao::all();
            $reprovacoes[$i]=[];
            foreach ( $soldadorqualificacaose as $s){
                $reprovacoes[$a]=SoldadorQualificacao::onlyTrashed()->where("id_soldador","=",$s->soldador->id)->where("id_qualificacao","=",$s->qualificacao->id)->count();
                $a=$a+1;
            }


            return view("inicio")->with(["soldadorqualificacaos"=>$soldadorqualificacaos,"usuario"=>$usuario,"reprovacoes"=>$reprovacoes]);
        }
        #Pegando os soldadores da empresa
        elseif($usuario->tipo==2){
            $empresa = $usuario->empresa;
            $soldadores = Soldador::where('id_empresa','=',$empresa[0]->id)->where("criado","=",1)->get();
            $soldadorqualificacaos=collect();


            #Checando se a soldadores cadastrados para nao ocorrer nenhum erro na view

            if(!$soldadores->isEmpty()) {
                foreach ($soldadores as $soldadore) {
                    $soldadors = (SoldadorQualificacao::where('id_soldador', '=', $soldadore->id)->where('status', '!=', 'qualificado')->select()->orderBy('status', 'desc')->get());
                    if (!empty($soldadors[0]->id)) {
                        foreach ($soldadors as $soldador){
                            $soldadorqualificacaos->push($soldador);
                        }
                    }
                }

                $soldadorqualificacaos=$soldadorqualificacaos->sortBy(['status','desc']);
                $soldadorqualificacaos1=$soldadorqualificacaos->count();

                $a=0;
                $reprovacoes[$soldadorqualificacaos1]=[];
                foreach ( $soldadorqualificacaos as $s){
                    $reprovacoes[$a]=SoldadorQualificacao::onlyTrashed()->where("id_soldador","=",$s->soldador->id)->where("id_qualificacao","=",$s->qualificacao->id)->count();
                    $a=$a+1;
                }


                return view("inicio")->with(["soldadorqualificacaos" => $soldadorqualificacaos, "usuario" => $usuario,"reprovacoes"=>$reprovacoes]);
            }else{
                $soldadorqualificacaos=null;
                return view("inicio")->with(["soldadorqualificacaos" => $soldadorqualificacaos, "usuario" => $usuario]);
            }
        }



    }

    public function entidades(Request $request)
    {
        $usuario = session()->get("Usuario");
        return view("entidades")->with(["usuario"=>$usuario]);
    }
    public function cadastrar(Request $request){
        $usuario = session()->get("Usuario");
        return view("cadastrar")->with(["usuario"=>$usuario]);
    }
    public function requalificacoes(Request $request){
        $usuario = session()->get("Usuario");
        $requalificacaoes = SoldadorQualificacao::where('status','=','em-processo')->select()->orderBy('created_at','desc')->get();
        return view("requalificacoes")->with(["usuario"=>$usuario,"requalificacaos"=>$requalificacaoes]);
    }

    public function listarEmpresas(Request $request){
        $usuario = session()->get("Usuario");
        $termo = $request->filtro;
        if($termo){
            $empresas = Empresa::where("razao_social","LIKE",'%'.$termo.'%')->orderBy('razao_social')->get();
        }else{
            $empresas = Empresa::orderBy('razao_social')->get();
        }        

        return view("listarEmpresas")->with(["usuario"=>$usuario,"empresas"=>$empresas,"termo"=>$termo]);
    }


    public function listarEps(Request $request){
        $usuario = session()->get("Usuario");
        $termo = $request->filtro;

        if($usuario->tipo==1){
            $empresas = Empresa::all();
            if($termo){
                $epss = Eps::where("criado","=",1)->where('id_empresa',$termo)->orderBy('nome')->get();
                $termo = Empresa::where('id',$termo)->pluck('nome_fantasia')->first();
            }else{
                $epss = Eps::where("criado","=",1)->orderBy('nome')->get();
            }
            return view("listarEPS")->with(["usuario"=>$usuario,"epss"=>$epss,"termo"=>$termo,"empresas"=>$empresas]);         
        }else{
            if($termo){
                $epss = Eps::where("criado","=",1)->where('id_empresa',$usuario->empresa->id)
                ->where("nome","LIKE",'%'.$termo.'%')->orderBy('nome')->get(); 
            }else{
                $epss = Eps::where("criado","=",1)->where('id_empresa',$usuario->empresa->id)->orderBy('nome')->get();  
            }
            return view("listarEPS")->with(["usuario"=>$usuario,"epss"=>$epss,"termo"=>$termo]);
        }       
        
    }


    public function listarSoldadores(Request $request){
        $usuario = session()->get("Usuario");
        $termo = $request->filtro;

        $rota=Route::getCurrentRoute()->getName();
        if($usuario->tipo==1){            
            if($termo){
                $soldadores=Soldador::where("criado","=",1)->where("nome","LIKE",'%'.$termo.'%')->orderBy('nome')->get();
            }else{
                $soldadores=Soldador::where("criado","=",1)->orderBy('nome')->get();
            }            

            return view("listarSoldadores")->with(["usuario"=>$usuario,"soldadores"=>$soldadores,"rota"=>$rota,"termo"=>$termo]);
        }
        if($usuario->tipo==2){

            $empresa=$usuario->empresa;

            if($termo){
                $soldadores=Soldador::where('id_empresa','=',$empresa->id)
                ->where("criado","=",1)->where("nome","LIKE",'%'.$termo.'%')->orderBy('nome')->get();
            }else{
                $soldadores=Soldador::where('id_empresa','=',$empresa->id)
                ->where("criado","=",1)->orderBy('nome')->get();
            }   

            return view("listarSoldadores")->with(["usuario"=>$usuario,"soldadores"=>$soldadores,"empresa"=>$empresa->id,"rota"=>$rota,"termo"=>$termo]);
        }

    }
    
    public function certificadoAjax($id){
        $certificados=Certificado::where('id_requalificacao','=',$id)->pluck("caminho");

        $view = view('downloadCertificados')->with(["certificados"=>$certificados])->render();

        return response()->json(['certificados'=>$certificados]);
    }

    public function arquivoAjax($id){
        $certificados=Arquivo::where('id_eps','=',$id)->pluck("caminho");

        $view = view('downloadCertificados')->with(["certificados"=>$certificados])->render();

        return response()->json(['certificados'=>$certificados]);
    }

    public function requisicoes(Request $request){
        $usuario = session()->get("Usuario");
        $soldadores=Soldador::where('criado','=',0)->get();
        $qualificacaos=SoldadorQualificacao::where('criado','=',0)->get();
        $epss=Eps::where('criado','=',0)->get();
        return view("requisicoesCadastro")->with(["usuario"=>$usuario,"soldadores"=>$soldadores,"epss"=>$epss,"qualificacaos"=>$qualificacaos]);
    }

    public function avaliarRequisicao(Request $request){
        $soldador=Soldador::where('id','=',$request->id)->first();
        $usuario = session()->get("Usuario");
        return view("avaliarRequisicao")->with(["usuario"=>$usuario,"soldador"=>$soldador]);
    }

    public function avaliarRequisicaoEps(Request $request){
        $eps=EPS::where('id','=',$request->id)->first();
        $usuario = session()->get("Usuario");
        $arquivos=Arquivo::where('id_eps','=',$eps->id)->get();
      
        return view("avaliarRequisicaoEps")->with(["usuario"=>$usuario,"eps"=>$eps,"arquivos"=>$arquivos]);
    }

    public function avaliarRequisicaoQualificacao(Request $request){
        $qualificacao=SoldadorQualificacao::where('id','=',$request->id)->first();
        $usuario = session()->get("Usuario");
      
        return view("avaliarRequisicaoQualificacao")->with(["usuario"=>$usuario,"qualificacao"=>$qualificacao]);
    }

    public function processarRequisicaoEps(Request $request){
        if($request->aceito==1){
            $eps=Eps::find($request->id);
            $eps->criado=1;
            $eps->save();      
        }
        elseif($request->aceito==0){
            Eps::destroy($request->id);
        }
        $usuario = session()->get("Usuario");
        $soldadores=Soldador::where('criado','=',0)->get();
        $qualificacaos=SoldadorQualificacao::where('criado','=',0)->get();
        $epss=Eps::where('criado','=',0)->get();
        return view("requisicoesCadastro")->with(["usuario"=>$usuario,"soldadores"=>$soldadores,"epss"=>$epss,"qualificacaos"=>$qualificacaos]);
    }

    public function processarRequisicaoQualificacao(Request $request){
        if($request->aceito==1){
            $qualificacao=SoldadorQualificacao::find($request->id);
            $qualificacao->criado=1;
            $qualificacao->save();      
        }
        elseif($request->aceito==0){
            SoldadorQualificacao::destroy($request->id);
        }
        $usuario = session()->get("Usuario");
        $soldadores=Soldador::where('criado','=',0)->get();
        $qualificacaos=SoldadorQualificacao::where('criado','=',0)->get();
        $epss=Eps::where('criado','=',0)->get();
        return view("requisicoesCadastro")->with(["usuario"=>$usuario,"soldadores"=>$soldadores,"epss"=>$epss,"qualificacaos"=>$qualificacaos]);
    }

    public function processarRequisicao(Request $request){
        if($request->aceito==1){
            $soldador=Soldador::find($request->id);
            $soldador->criado=1;
            $soldador->save();
        }elseif ($request->aceito==0){
            $soldador=Soldador::find($request->id);
            $soldador->cpf=Str::random(14);;
            $soldador->email=null;
            $soldador->save();
            Soldador::destroy($request->id);
        }
        $usuario = session()->get("Usuario");
        $soldadores=Soldador::where('criado','=',0)->get();
        $qualificacaos=SoldadorQualificacao::where('criado','=',0)->get();
        $epss=Eps::where('criado','=',0)->get();
        return view("requisicoesCadastro")->with(["usuario"=>$usuario,"soldadores"=>$soldadores,"epss"=>$epss,"qualificacaos"=>$qualificacaos]);
    
    }

    public function requisitarSoldador(Request $request){
        $usuario = session()->get("Usuario");
        $empresa = $request->idEmpresa;
        return view("requisitarSoldador")->with(["usuario"=>$usuario,"empresa"=>$empresa]);
    }

    public function requisitarQualificacao(Request $request){
        $usuario = session()->get("Usuario");
        $soldador = $request->soldador;
        $empresa = $request->idEmpresa;
        $epss=Eps::where("id_empresa","=",$empresa)->where('criado','=',1)->get();
        $processos=Processo::all();
        return view("requisitarQualificacao")->with(["usuario"=>$usuario,"soldador"=>$soldador,"empresa"=>$empresa,"epss"=>$epss,"processos"=>$processos]);
    }

    public function salvandoRequisicao(Request $request){

        $soldadores=Soldador::all();
        $lixoCpf =Soldador::onlyTrashed()->where("cpf","=",$request->cpf)->get();
        $lixoEmail =Soldador::onlyTrashed()->where("email","=",$request->email)->get();


        foreach ($soldadores as $soldador){
            if($soldador->cpf==$request->cpf ||$lixoCpf->isNotEmpty()){
                $request->session()->flash("erro","Já existe um soldador cadastrado com esse CPF.");
                $usuario = session()->get("Usuario");
                $erro = $request->session()->get("erro");
                return view("requisitarSoldador")->with(["empresa"=>$request->id_empresa, "usuario"=>$usuario,"erro"=>$erro]);

            }

            if($soldador->email ||$lixoEmail->isNotEmpty()) {
                if ($soldador->email == $request->email||$lixoEmail->isNotEmpty()) {
                    $request->session()->flash("erro", "Já existe um soldador cadastrado com esse email.");
                    $usuario = session()->get("Usuario");
                    $erro = $request->session()->get("erro");
                    return view("requisitarSoldador")->with(["empresa"=>$request->id_empresa, "usuario"=>$usuario,"erro"=>$erro]);

                }
            }
        }

        $soldador = new Soldador();
        $soldador->nome=$request->nome;
        $soldador->cpf=$request->cpf;
        $soldador->sinete=$request->sinete;
        $soldador->matricula=$request->matricula;
        $soldador->email=$request->email;
        $soldador->id_empresa=$request->id_empresa;
        $soldador->criado=0;

        $soldador->save();
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
        return redirect()->route("hubSoldadores");
    }

    public function requisitarEps(Request $request){
        $usuario = session()->get("Usuario");
        $empresa = $request->idEmpresa;
        return view("requisitarEps")->with(["usuario"=>$usuario,"empresa"=>$empresa]);
    }

    public function salvandoRequisicaoEps(Request $request){
        $eps = new Eps();
        $eps->nome=$request->nome;
        $eps->id_empresa=$request->id_empresa;
        $eps->criado=0;
        $eps->save();
        foreach ($request->files as $todosarquivos) {
            foreach ($todosarquivos as $arquivo) {
                # cria um novo arquivoEps
                $arquivoEps = new Arquivo();
                $arquivoEps->id_eps = $eps->id;
                $arquivoEps->caminho='';
                //chmod($request->file->getPath(),0755);
                chmod($arquivo->getRealPath(),0755);
                $arquivoEps->save();
                $extensao = $arquivo->getClientOriginalExtension();
                $imagem = File::move($arquivo, public_path(). '/arquivos/arquivoEPS-id' . $arquivoEps->id . '.' . $extensao);
                $arquivoEps->caminho = '/arquivos/arquivoEPS-id'.$arquivoEps->id.'.'.$extensao;
                $arquivoEps->save();
            }
        }
        return redirect()->route("paginaInicial");
    }

    public function salvandoRequisicaoQualificacao(Request $request){
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
        $soldador_qualificacao->caminho_certificado=$request->caminho_certificado;
        $soldador_qualificacao->criado=0;
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
        return redirect()->route("paginaInicial");
    }

    public function listagemLogin(){
        $usuario = session()->get("Usuario");
        //pegar todos os logins/usuarios
        //listar em ordem alfabetica da empresa (?)
        return view('/listarLogins')->with(["usuario"=>$usuario]);
    }

    public function cadastroLogin(){
        $usuario = session()->get("Usuario");
        if($usuario->tipo == 1){
            $empresas = Empresa::all();
            return view('/cadastroLogin')->with(["usuario"=>$usuario,"empresas"=>$empresas]);
        }else{
            return view('/cadastroLogin')->with(["usuario"=>$usuario]);
        }        
    }

    public function listagemLogin(){
        $usuario = session()->get("Usuario");
        //pegar todos os logins/usuarios
        //listar em ordem alfabetica da empresa (?)
        return view('/listarLogins')->with(["usuario"=>$usuario]);
    }

    public function cadastroLogin(){
        $usuario = session()->get("Usuario");
        if($usuario->tipo == 1){
            $empresas = Empresa::all();
            return view('/cadastroLogin')->with(["usuario"=>$usuario,"empresas"=>$empresas]);
        }else{
            return view('/cadastroLogin')->with(["usuario"=>$usuario]);
        }        
    }



}
