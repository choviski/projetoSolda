<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Arquivo;
use App\Eps;
use File;
use Illuminate\Http\Request;

class EpsController extends Controller
{
    public function create(){
        $usuario=session()->get("Usuario");
        $empresas = Empresa::all();
        return view("cadastroEps")->with(["empresas"=>$empresas,"usuario"=>$usuario]);
    }
    public function store(Request $request){
        $eps = Eps::create($request->all());
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
        $usuario = session()->get("Usuario");
        $empresas = Empresa::orderBy('razao_social')->get();
        return redirect()->route('listarEps');
    }
    public function destroy(Request $request){
        Eps::destroy($request->id);
        $usuario = session()->get("Usuario");
        $empresas = Empresa::orderBy('razao_social')->get();
        return redirect()->route('listarEps');
    }
}
