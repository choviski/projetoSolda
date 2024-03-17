<?php

namespace App\Http\Controllers;


use Dompdf\Dompdf;
use Illuminate\Support\Facades\Log;
use PDF;
use Dompdf\Options;
use App\EpsAvancada;
use Illuminate\Http\Request;
use App\Tecnico;

class EpsAvancadaController extends Controller
{
    public function listarEpsAvancada(Request $request){
        $usuario = session()->get("Usuario");
        if($usuario->tipo==1){ // se é a infosolda pega todas as EPS
            $epsAvancadas = EpsAvancada::paginate(10);
        }else{ // se n for pega somente as da própria empresa
            $epsAvancadas = EpsAvancada::where("id_empresa",$usuario->empresa->id)->with('processos')->paginate(10);
        }
        return view("epsAvancada/listarEps")->with(["usuario"=>$usuario,"epsAvancadas"=>$epsAvancadas]);
    }

    public function cadastrarEpsAvancada(Request $request){
        $usuario = session()->get("Usuario");
        return view("epsAvancada/cadastrarEps")->with(["usuario"=>$usuario]);
    }

    public function armazenarEpsAvancada(Request $request){

        $usuario = session()->get("Usuario");
        $tecnica = Tecnico::create($request->all());

        Log::info(print_r($usuario,true));

        if($usuario->tipo==1){
            $eps = EpsAvancada::create([
                'nome'=>$request->nome,
                'data'=>$request->data,
                'norma'=>$request->norma,
                'rqp'=>$request->rqp,
                'notas'=>$request->notas,
                'informacao_tecnica_id' => $tecnica->id,
                'id_empresa' => null,
            ]);
        }else{
            $eps = EpsAvancada::create([
                'nome'=>$request->nome,
                'data'=>$request->data,
                'notas'=>$request->notas,
                'norma'=>$request->norma,
                'rqp'=>$request->rqp,
                'informacao_tecnica_id' => $tecnica->id,
                'id_empresa' => $usuario->empresa->id,
            ]);
        }

        $processos = $request->input('processo_ids');
        $arrayProcessos = explode(",",$processos);

        if ($arrayProcessos) {
            foreach ($arrayProcessos as $processoId) {
                $eps->processos()->attach($processoId);
            }
        }
        return response()->json(['message'=>'Eps Cadastrada com Sucesso']);
    }

    public function deleteEpsAvancada($id){
        EpsAvancada::destroy($id);
        return response()->json(['message'=>'ok']);
    }

    public function geraEPS(Request $request){
        $eps = EpsAvancada::find($request->id_eps);
        $usuario = session()->get("Usuario");

        // Infelizmente é um inferno colocar as imagens no PDF
        // É preciso converter elas pra base64 e fazer toda essa maracutaia pra funcionar
        // Imagem da Empresa.

        if($usuario->id_empresa) {
            $path = public_path() . $usuario->empresa->foto;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $empresa_image = 'data:image/' . $type . ';base64,' . base64_encode($data);
        }else{
            $path = public_path() . '/imagens/empresa_default.png';
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $empresa_image = 'data:image/' . $type . ';base64,' . base64_encode($data);
        }

        // Imagem da Junta.
        // Confesso que estou um cadinho confuso. Se uma EPS pode ter mais que um processo.
        // E cada processo tem uma junta. Como que fica? Qual imagem a gente coloca?
        // Na verdade eu nem sei como seria o layout de uma pdf de EPS com mais de um processo.
        // Mais uma dúvida que precisamos tirar com eles..
        $path = public_path().$eps->processos[0]->junta->imagem;
        $type = pathinfo($path,PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $imagem_junta = 'data:image/'. $type. ';base64,' . base64_encode($data);

        $pdf = new Dompdf();

        $view = view('pdf.eps.eps',[
            'imagem_emrpesa'=>$empresa_image,
            'imagem_junta'=>$imagem_junta,
            'eps'=>$eps
            ])->render();

        $pdf->loadHtml($view);
        $pdf->setPaper('A4','portrait');
        $pdf->render();
        header('Content-type: application/pdf');

        echo $pdf->output();
        exit;
        //$pdf->stream();
    }


}
