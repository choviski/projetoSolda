<?php

namespace App\Http\Controllers;

use App\Acesso;
use App\Http\Controllers\Controller;
use App\SoldadorQualificacao;
use App\Usuario;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create()
    {
        $erro=session()->get("erro");
        return view("cruds.usuario.create")->with(["erro"=>$erro]);
    }

    public function cadastrar(Request $request){
        $usuarios=Usuario::all();
        foreach ($usuarios as $usuario){
            $request->session()->flash("erro","Já ha um usuário cadastrado com esse e-mail, por favor tente usar outro e-mail");
            if($usuario->email==$request->email){
                return redirect()->back();
            }
        }
        Usuario:: create($request->all());
        $request->session()->flash("criado","Usuario cadastrado com sucesso!");
        return redirect()->route("inicio");
    }

    public function index(Request $request){
        $mensagem = $request->session()->get("mensagem");
        $criado=$request->session()->get("criado");
        return view("welcome")->with(["mensagem"=>$mensagem,"criado"=>$criado]);
    }
    public function entrar(Request $request){

        $Usuario= Usuario::where('email','=',$request->email)->get();
        if(!$Usuario->isEmpty()){
            $Usuario=$Usuario[0];

            if ($Usuario->senha==$request->senha){
                $request->session()->put("Usuario",$Usuario);
                $acesso = new Acesso();
                $acesso->id_usuario=$Usuario->id;
                $acesso->save();
                return redirect()->route("email");
            }
            $request->session()->flash("mensagem","Usuario ou senha incorretos");
            return redirect()->back();
        }
        $request->session()->flash("mensagem","Usuario não cadastrado");
        return redirect()->back();
    }

    public function sair(Request $request){
        $request->session()->flush();
        return redirect("/");
    }
}
