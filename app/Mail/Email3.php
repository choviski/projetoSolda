<?php

namespace App\Mail;

use App\Http\Controllers\QualificacaoController;
use App\SoldadorQualificacao;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email3 extends Mailable
{
    use Queueable, SerializesModels;
    private $qualificacao;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(SoldadorQualificacao $qualificacao)
    {
        $this->qualificacao=$qualificacao;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject("SEU REQUERIMENTO DE REQUALIFICAÇÃO FOI RESPONDIDO!!!");
        $this->to("{$this->qualificacao->soldador->empresa->email}", "{$this->qualificacao->soldador->empresa->razao_social}");
        if($this->qualificacao->status=="qualificado"){
            $mensagem="Sua requalificacao foi aprovada";
            $m="aprovada";
        }else{
            $mensagem="Sua requalificacao foi reprovada";
            $m="reprovada";
        }
        return $this->markdown('mail.email3')->with(["dado"=>$this->qualificacao,"mensagem"=>$mensagem,"m"=>$m]);
    }


}

