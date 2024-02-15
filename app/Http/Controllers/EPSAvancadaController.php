<?php

namespace App\Http\Controllers;


use Dompdf\Dompdf;
use PDF;
use Dompdf\Options;
use App\EPSAvancada;
use Illuminate\Http\Request;
use App\Tecnico;

class EPSAvancadaController extends Controller
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

        if($usuario->tipo==1){
            $eps = EpsAvancada::create([
                'nome'=>$request->nome,
                'data'=>$request->data,
                'notas'=>$request->notas,
                'informacao_tecnica_id' => $tecnica->id
            ]);
        }else{
            $eps = EpsAvancada::create([
                'nome'=>$request->nome,
                'data'=>$request->data,
                'notas'=>$request->notas,
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

    public function geraEPS(){
        $usuario = session()->get("Usuario");

        // Infelizmente é um inferno colocar as imagens que no PDF
        // É preciso converter elas pra base64 e fazer toda essa maracutaia pra funcionar
        // Imagem da Empresa.
        $path = public_path().$usuario->empresa->foto;
        $type = pathinfo($path,PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $empresa_image = 'data:image/'. $type. ';base64,' . base64_encode($data);

        // Imagem da Junta. (Por enquanto usa a imgem de place holder)
        $path = public_path().'/imagens/placeholder_imagem.jpg';
        $type = pathinfo($path,PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $imagem_junta = 'data:image/'. $type. ';base64,' . base64_encode($data);

        $pdf = new Dompdf();

        $view = view('pdf.eps.eps',[
            'imagem_emrpesa'=>$empresa_image,
            'imagem_junta'=>$imagem_junta
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
