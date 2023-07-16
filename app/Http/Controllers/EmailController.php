<?php

namespace App\Http\Controllers;

use App\Mail\email;
use App\Mail\email2;
use App\Mail\email3;
use App\Mail\Email4;
use App\Mail\Email5;
use App\Mail\Email6;
use App\SoldadorQualificacao;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use stdClass;

class EmailController extends Controller
{
    public function envioEmailQualificacao()
    {/*
        $qualificacaos = SoldadorQualificacao::select(
            DB::raw("*,(TIMESTAMPDIFF(day,now(),validade_qualificacao)) as tempo")
        )
            ->where('aviso', 1)
            ->orderBy('validade_qualificacao', 'desc')
            ->get();

        foreach ($qualificacaos as $qualificacao) {
            if ($qualificacao->tempo < 40) {
                Mail::send(new Email($qualificacao));
            }
        }
        $this->envioEmailAcesso();
*/
        return redirect()->route("paginaInicial");
    }

    private function envioEmailAcesso()
    {
        
        //Mail::send(new Email6());
    }

    public function envioEmailCadastro($id)
    {
        $usuario = Usuario::find($id);
       // Mail::send(new Email2($usuario));

        return redirect()->route("paginaInicial");
    }

    public function envioEmailRespostaRequalificacao($id)
    {
        $qualificacao=SoldadorQualificacao::find($id);
        //Mail::send(new Email3($qualificacao));

        return redirect()->route("paginaInicial");
    }

    public function envioEmailRequisicaoRequalificacao($id)
    {
        $qualificacao=SoldadorQualificacao::find($id);
        //Mail::send(new Email4($qualificacao));

        return redirect()->route("paginaInicial");
    }

    public function envioEmailLead(Request $request)
    {
        $usuario = new stdClass();
        $usuario->email=$request->email;
        $usuario->telefone=$request->telefone;
        //Mail::send(new Email5($usuario));

        return redirect()->route("inicio");
    }
}
