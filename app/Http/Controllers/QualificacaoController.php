<?php

namespace App\Http\Controllers;


use App\Foto;
use App\Http\Controllers\Controller;
use App\NormaQualificacao;
use App\Processo;
use App\Qualificacao;
use App\SoldadorQualificacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use File;

class QualificacaoController extends Controller
{
    public function index()
    {
        $usuario = session()->get("Usuario");
        $qualificacoes = Qualificacao::all();
        return view("cruds.qualificacao.index")->with(["qualificacoes"=>$qualificacoes,"usuario"=>$usuario]);
    }
    public function create()
    {
        $usuario = session()->get("Usuario");
        $processos = Processo::all();
        return view("cruds.qualificacao.create")->with(["processos"=>$processos,"usuario"=>$usuario]);
    }
    public function store(Request $request)
    {
        $usuario = session()->get("Usuario");
        Qualificacao::create($request->all());
        return redirect()->route("qualificacao.index")->with(["usuario"=>$usuario,"usuario"=>$usuario]);
    }
    public function show($id)
    {
        $usuario = session()->get("Usuario");
        $qualificacao=Qualificacao::find($id);
        return view("cruds.qualificacao.show")->with(["qualificacao"=>$qualificacao,"usuario"=>$usuario]);
    }
    public function edit($id)
    {
        $usuario = session()->get("Usuario");
        $processos = Processo::all();
        $qualificacao=Qualificacao::find($id);
        return view("cruds.qualificacao.edit")->with(["qualificacao"=>$qualificacao,"processos"=>$processos,"usuario"=>$usuario]);
    }
    public function update(Request $request, $id)
    {
        $usuario = session()->get("Usuario");
        Qualificacao::find($id)->update($request->all());
        return redirect()->route("qualificacao.index")->with(["usuario"=>$usuario]);
    }
    public function destroy(Request $request)
    {
        $usuario = session()->get("Usuario");
        Qualificacao::destroy($request->id);
        return redirect("/qualificacao");
    }
    public function requalificar(Request $request){
        $soldadorQualificacao=SoldadorQualificacao::where("id","=",$request->soldadorQualificacao)->get();
        $usuario = session()->get("Usuario");
        return view ("cadastrarNovaQualificacao")->with(["soldadorQualificacao"=>$soldadorQualificacao[0],"usuario"=>$usuario]);
    }
    public function editar($id,Request $request){
        SoldadorQualificacao::destroy($id);
        $qualificacao=new SoldadorQualificacao();
        $qualificacao->cod_rqs=$request->oi;
        $qualificacao->id_soldador=$request->id_soldador;
        $qualificacao->id_qualificacao=$request->id_qualificacao;
        $qualificacao->data_qualificacao=$request->data_qualificacao;
        $qualificacao->posicao=$request->posicao;
        $qualificacao->eletrodo=$request->eletrodo;
        $qualificacao->aviso=0;
        $qualificacao->texto=$request->texto;


        $qualificacao->status="em-processo";
        $qualificacao->validade_qualificacao=$request->validade_qualificacao;
        $qualificacao->lancamento_qualificacao=$request->lancamento_qualificacao;
        $qualificacao->nome_certificado=$request->nome_certificado;
        $qualificacao->caminho_certificado=$request->caminho_certificado;
        $qualificacao->save();

        foreach ($request->files as $todasasfoto) {
            foreach ($todasasfoto as $foto) {
                # cria a uma nova fotoRequalificacao
                $fotoRequalificacao = new Foto();
                $fotoRequalificacao->id_requalificacao = $qualificacao->id;
                $fotoRequalificacao->caminho='';
                //chmod($request->file->getPath(),0755);
                chmod($foto->getRealPath(),0755);
                $fotoRequalificacao->save();
                $extensao = $foto->getClientOriginalExtension();
                $imagem = File::move($foto, public_path(). '/imagem-qualificacao/fotoRequalificacao-id' . $fotoRequalificacao->id . '.' . $extensao);
                $fotoRequalificacao->caminho = '/imagem-qualificacao/fotoRequalificacao-id'.$fotoRequalificacao->id.'.'.$extensao;
                $fotoRequalificacao->save();
            }
        }
        $contar=SoldadorQualificacao::onlyTrashed()->where("id_soldador","=",$qualificacao->soldador->id)->where("id_qualificacao","=",$qualificacao->qualificacao->id)->count();
        return redirect()->route("paginaInicial");
    }

    public function avaliarRequalificacao(Request $request)
    {
        $requalificacao=SoldadorQualificacao::find($request->id);
        $usuario = session()->get("Usuario");
        $fotos=Foto::where("id_requalificacao","=",$requalificacao->id)->orderBy('id', 'asc')->get();

        return view("avaliarRequalificacao")->with(["requalificacao"=>$requalificacao,"usuario"=>$usuario,"fotos"=>$fotos]);
    }

    public function processarRequalificacao(Request $request)
    {
        if ($request->aceito == 1) {
            $requalificacao = SoldadorQualificacao::find($request->id);
            $requalificacao->status = "qualificado";
            $requalificacao->aviso=1;
            $requalificacao->save();
            $tempoNorma=NormaQualificacao::where("id_qualificacao",'=',$requalificacao->id_qualificacao)->get();
            $tempo=$tempoNorma[0]->norma->validade;
            $validade=Carbon::parse($requalificacao->validade_qualificacao);
            $requalificacao->validade_qualificacao=($validade->addMonth($tempo)->toDateString());
            $requalificacao->data_qualificacao=Carbon::now()->toDateString();
            $requalificacao->lancamento_qualificacao=$requalificacao->updated_at;


            $requalificacao->save();
            return redirect()->route("email3",['id'=> $requalificacao->id]);
            return redirect()->route("requalificacoes");
        }
        if ($request->aceito == 0) {
            $requalificacao = SoldadorQualificacao::find($request->id);
            $requalificacao->status = "nao-qualificado";
            $requalificacao->aviso=1;
            $requalificacao->save();
            return redirect()->route("email3",['id'=> $requalificacao->id]);

            return redirect()->route("requalificacoes");
        }
    }
}
