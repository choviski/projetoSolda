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
    // Campos que podem ser usados como filtro (pra impedir alguma sacanagem aí)    
    // Seguem o seguinte padrão de nome caso sejam campos de algum relacionamento: 
    // nomeRelacao1-nomeRelacao2-...-nomeRelacaoN-nomeValor.
    private $camposPermitidos = [
        "processos-gas-gas_protecao",
        "processos-metaisAdicao-classificacao_aws",
        "processos-metaisAdicao-forma_consumivel",
        "processos-materiaisBases-tipo_grau",
        "processos-junta-cota_t",
        "processos-junta-imagem",
        "norma",
        "processos-qual_processo"
    ];

    private $exibicaoNomeCampos = [
        "gas_protecao"=>'Gás de proteção',
        "classificacao_aws"=>'Classificação AWS/S.F.A.',
        "forma_consumivel"=>'Forma do consumível',
        "cota_t"=> "Cota T (Junta)",
        "tipo_grau"=>"Especificação tipo/grau",
        "imagem"=>"Tipo de Chanfro (Junta)",
        "norma"=>"Norma",
        "qual_processo"=>"Tipo do processo"
    ];
    

    public function listarEpsAvancada(Request $request){
        $usuario = session()->get("Usuario");
        
        $query = EpsAvancada::query();

        // Se o usuário for do tipo 1 (Infosolda), pega todas as EPS
        if ($usuario->tipo == 1) {
            $query->with('processos');
        } else {
            // Se não for, pega somente as da própria empresa
            $query->where("id_empresa", $usuario->empresa->id)->with('processos');
        }

        // Obtém todos os parâmetros da requisição
        $filtros = $request->all();
        
        // Vetor utilzado para mostrar no front quais os valores filtrados
        $camposFiltrados = [];

        foreach ($filtros as $campo => $valor) {
            // Verifica se o valor não está vazio e se o campo está presente no array de campos permitidos
            if ($valor !== null && $valor !== '' && in_array($campo, $this->camposPermitidos)) {
                // Se o campo contém "_" indicando uma relação aninhada
                
                if (strpos($campo, '-') !== false) {
                    
                    // Divide o as relações usando "-"
                    $partes = explode('-', $campo);
        
                    // Remove o último elemento do array (que é o nome do campo)
                    $nomeCampo = array_pop($partes);

                    if($nomeCampo=="imagem"){
                        // Pegando o tipo de chanfro sem o caminho da imagem
                        $chanfro = preg_replace('/\/juntas\/junta-|\.jpg/', '', $valor);
                        $chanfro = str_replace('-', ' ', $chanfro);
                        $camposFiltrados[$campo] = [
                            $this->exibicaoNomeCampos[$nomeCampo],
                            $chanfro,
                            $valor];
                    }else{
                        $camposFiltrados[$campo] = [
                            $this->exibicaoNomeCampos[$nomeCampo],
                            $valor];
                    }
                    
        
                    // Inicializa a query com a relação principal
                    $query->whereHas($partes[0], function ($query) use ($partes, $nomeCampo, $valor) {
                        // Adiciona as condições para cada relação aninhada
                        for ($i = 1; $i < count($partes); $i++) {
                            $query->whereHas($partes[$i], function ($query) use ($partes, $valor,$nomeCampo, $i) {
                                if ($i === count($partes) - 1) {
                                    // Se for a última relação aninhada, adiciona a condição no campo desejado
                                    $query->where($nomeCampo, $valor);
                                }
                            });
                        }
                    });
                } else {
                    // Se não for uma relação aninhada, adiciona uma condição normal
                    $query->where($campo, $valor);
                    $camposFiltrados[$campo] = [$campo,$valor];
                }
            }
        }
        
        $resultados = $query->paginate(10);
        return view("epsAvancada/listarEps")->with(["usuario"=>$usuario,"epsAvancadas"=>$resultados,"filtros"=>$camposFiltrados]);
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
