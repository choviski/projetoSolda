<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Soldador;
use App\SoldadorQualificacao;
use DateTime;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function getAllSoldadoresMonths(){
        $soldadores_meses_array = array();
        $datas_soldadores = Soldador::orderBy('created_at', 'ASC')->pluck('created_at');
        $datas_soldadores = json_decode($datas_soldadores);
        if (!empty($datas_soldadores)) {
            foreach ($datas_soldadores as $unf_datas) {
                $datas = new DateTime($unf_datas);
                $mes_numero = $datas->format('m');
                $mes_nome = $datas->format('M');
                $soldadores_meses_array[$mes_numero] = $mes_nome;
            }
            return ($soldadores_meses_array);
        }
    }

    function getMonthlySoldadorCount($mes)
    {
        $monthly_soldador_count = Soldador::whereMonth('created_at', $mes)->get()->count();
        return $monthly_soldador_count;
    }



    function getAllEmpresasMonths(){
        $empresas_meses_array = array();
        $datas_empresas = Empresa::orderBy('created_at', 'ASC')->pluck('created_at');
        $datas_empresas = json_decode($datas_empresas);
        if (!empty($datas_empresas)) {
            foreach ($datas_empresas as $unf_datas) {
                $datas = new DateTime($unf_datas);
                $mes_numero = $datas->format('m');
                $mes_nome = $datas->format('M');
                $empresas_meses_array[$mes_numero] = $mes_nome;
            }
            return ($empresas_meses_array);
        }
    }

    function getMonthlyEmpresaCount($mes)
    {
        $monthly_empresa_count = Empresa::whereMonth('created_at', $mes)->get()->count();
        return $monthly_empresa_count;
    }



    public function getMonthlyAllData(){



        $usuario = session()->get("Usuario");
        $empresas = Empresa::all();
        # Pegando os dados mensais dos soldadores
        $monthly_soldador_count_array = array();
        $soldador_meses_array = $this->getAllSoldadoresMonths();
        $meses_nome__soldador_array = array();
        if (!empty($soldador_meses_array)) {
            foreach ($soldador_meses_array as $mes_numero => $mes_nome) {
                $monthly_soldador_count = $this->getMonthlySoldadorCount($mes_numero);
                array_push($monthly_soldador_count_array, $monthly_soldador_count);
                array_push($meses_nome__soldador_array, $mes_nome);
            }
        }
        # Pegando os dados mensais das empresas
        $monthly_empresa_count_array = array();
        $empresa_meses_array = $this->getAllEmpresasMonths();
        $meses_nome__empresa_array = array();
        if (!empty($empresa_meses_array)) {
            foreach ($empresa_meses_array as $mes_numero => $mes_nome) {
                $monthly_empresa_count = $this->getMonthlyEmpresaCount($mes_numero);
                array_push($monthly_empresa_count_array, $monthly_empresa_count);
                array_push($meses_nome__empresa_array, $mes_nome);
            }
        }

        #colocando os dados na variavel
        $monthly_data_array = array (
            #colocando os dados sobre os status da qualificacao
            'status_qualificado' => SoldadorQualificacao::where('status','=','qualificado')->get()->count(),
            'status_nao_qualificado' => SoldadorQualificacao::where('status','=','nao-qualificado')->get()->count(),
            'status_em_processo' => SoldadorQualificacao::where('status','=','em-processo')->get()->count(),
            'status_atrasado' => SoldadorQualificacao::where('status','=','atrasado')->get()->count(),
            #colocando os dados sobre os soldadores
            'meses_soldadores' => $meses_nome__soldador_array,
            'soldadores' => $monthly_soldador_count_array,
            'total_soldadores' => Soldador::count(),
            #colocando os dados sobre as empresas
            'meses_empresas' => $meses_nome__empresa_array,
            'empresas' => $monthly_empresa_count_array,
            'total_empresas' => Empresa::count(),
            'nome'=>"TODAS EMPRESAS",

        );

        return view('/dashboard')->with(['dados' => $monthly_data_array,"usuario"=>$usuario,"empresas"=>$empresas]);
    }

    function dadosEmpresaAjax($id){
        if($id==0){
            $dados=array(
                'status_qualificado' => SoldadorQualificacao::where('status','=','qualificado')->get()->count(),
                'status_nao_qualificado' => SoldadorQualificacao::where('status','=','nao-qualificado')->get()->count(),
                'status_em_processo' => SoldadorQualificacao::where('status','=','em-processo')->get()->count(),
                'status_atrasado' => SoldadorQualificacao::where('status','=','atrasado')->get()->count(),
                'nome'=>'TODAS EMPRESAS',
            );
        }else{
            $empresa=Empresa::find($id);
            $dados=array(
                'nome'=>$empresa->razao_social,
                'status_qualificado' =>DB::table('soldadores')->
                    join('soldador_qualificacoes','soldador_qualificacoes.id_soldador','=','soldadores.id')->
                    where('soldadores.id_empresa','=',$empresa->id)->where('soldador_qualificacoes.status','=','qualificado')->where('soldador_qualificacoes.deleted_at','=',null)->get()->count(),

                'status_nao_qualificado' =>DB::table('soldadores')->
                join('soldador_qualificacoes','soldador_qualificacoes.id_soldador','=','soldadores.id')->
                where('soldadores.id_empresa','=',$empresa->id)->where('soldador_qualificacoes.status','=','nao-qualificado')->where('soldador_qualificacoes.deleted_at','=',null)->get()->count(),

                'status_em_processo' =>DB::table('soldadores')->
                join('soldador_qualificacoes','soldador_qualificacoes.id_soldador','=','soldadores.id')->
                where('soldadores.id_empresa','=',$empresa->id)->where('soldador_qualificacoes.status','=','em-processo')->where('soldador_qualificacoes.deleted_at','=',null)->get()->count(),

                'status_atrasado' =>DB::table('soldadores')->
                join('soldador_qualificacoes','soldador_qualificacoes.id_soldador','=','soldadores.id')->
                where('soldadores.id_empresa','=',$empresa->id)->where('soldador_qualificacoes.status','=','atrasado')->where('soldador_qualificacoes.deleted_at','=',null)->get()->count(),


            );
        }
        return $dados;
    }

    public function requalificacoesMensaisAjax(Request $request,$mes,$ano){
        $requalificacoesMensais=SoldadorQualificacao::whereMonth("created_at","=",$mes)->whereYear("created_at",'=',$ano)->get();
        if ($request->ajax()){
            $view = view('tabelaRequalificacao')->with(["requalificacaos"=>$requalificacoesMensais])->render();
            return response()->json(['html'=>$view]);
        }
        $view = view('tabelaRequalificacao')->with(["requalificacaos"=>$requalificacoesMensais])->render();
        dd($view);


    }


}
