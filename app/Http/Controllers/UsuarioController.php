<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function cadastrarNovoUsuario(Request $request)
    {
        $empresa = Empresa::find($request->empresa);
        Usuario::create([
            'nome' => $empresa->razao_social,
            'email' => $request->email,
            'senha' => $request->senha,
            'tipo' => $request->tipo,
            'id_empresa' => $empresa->id,
        ]);
        return redirect()->route("email");
    }
}
