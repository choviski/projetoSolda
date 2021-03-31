<?php

namespace App\Http\Controllers;

use App\Foto;
use App\Empresa;
use App\Publicacao;
use App\Soldador;
use App\SoldadorQualificacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Carbon\Carbon;
use File;

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
            $empresa = Empresa::where('id_usuario','=',$usuario->id)->get();
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
        $requalificacaoes = SoldadorQualificacao::where('status','=','em-processo')->select()->orderBy('created_at','desc')->paginate(5);
        if($request->ajax()){
            $view = view('cardRequalificacoes')->with(["usuario"=>$usuario,"requalificacaos"=>$requalificacaoes])->render();
            return response()->json(['html'=>$view]);
        }
        return view("requalificacoes")->with(["usuario"=>$usuario,"requalificacaos"=>$requalificacaoes]);
    }

    public function listarEmpresas(Request $request){
        $usuario = session()->get("Usuario");
        $empresas = Empresa::orderBy('razao_social')->paginate(5);
        if($request->ajax()){
            $view = view('cardEmpresas')->with(["usuario"=>$usuario,"empresas"=>$empresas])->render();
            return response()->json(['html'=>$view]);
        }
        return view("listarEmpresas")->with(["usuario"=>$usuario,"empresas"=>$empresas]);
    }





    public function listarSoldadores(Request $request){
        $usuario = session()->get("Usuario");

        $rota=Route::getCurrentRoute()->getName();
        if($usuario->tipo==1){
            //$soldadores=Soldador::orderBy('nome')->get();
            //return view("listarSoldadores")->with(["usuario"=>$usuario,"soldadores"=>$soldadores,"rota"=>$rota]);
            $soldadores=Soldador::where("criado","=",1)->orderBy('nome')->paginate(5);
            if($request->ajax()){
                    $view = view('cardSoldadores')->with(["usuario"=>$usuario,"soldadores"=>$soldadores,"rota"=>$rota])->render();
                    return response()->json(['html'=>$view]);
            }
            return view("listarSoldadores")->with(["usuario"=>$usuario,"soldadores"=>$soldadores,"rota"=>$rota]);

        }
        if($usuario->tipo==2){
            $empresa=Empresa::where('id_usuario','=',$usuario->id)->first();
            $soldadores=Soldador::where('id_empresa','=',$empresa->id)->where("criado","=",1)->orderBy('nome')->paginate(5);
            if($request->ajax()){
                $view = view('cardSoldadores')->with(["usuario"=>$usuario,"soldadores"=>$soldadores,"rota"=>$rota,"empresa"=>$empresa->id])->render();
                return response()->json(['html'=>$view]);
            }
            return view("listarSoldadores")->with(["usuario"=>$usuario,"soldadores"=>$soldadores,"empresa"=>$empresa->id,"rota"=>$rota]);
        }

    }


    public function requisicoes(Request $request){
        $usuario = session()->get("Usuario");
        $soldadores=Soldador::where('criado','=',0)->get();
        return view("requisicoesCadastro")->with(["usuario"=>$usuario,"soldadores"=>$soldadores]);
    }

    public function avaliarRequisicao(Request $request){
        $soldador=Soldador::where('id','=',$request->id)->first();
        $usuario = session()->get("Usuario");
        return view("avaliarRequisicao")->with(["usuario"=>$usuario,"soldador"=>$soldador]);
    }

    public function processarRequisicao(Request $request){
        if($request->aceito==1){
            $soldador=Soldador::find($request->id);
            $soldador->criado=1;
            $soldador->save();
        }elseif ($request->aceito==0){
            Soldador::destroy($request->id);
        }
        $usuario = session()->get("Usuario");
        $soldadores=Soldador::where('criado','=',0)->get();
        return view("requisicoesCadastro")->with(["usuario"=>$usuario,"soldadores"=>$soldadores]);

    }
    public function requisitarSoldador(Request $request){
        $usuario = session()->get("Usuario");
        $empresa = $request->idEmpresa;
        return view("requisitarSoldador")->with(["usuario"=>$usuario,"empresa"=>$empresa]);
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
        return view("selecionarQualificacoes")->with(["soldador"=>$soldador->id,"usuario"=>$usuario]);
    }






}
