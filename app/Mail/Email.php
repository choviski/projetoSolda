<?php

namespace App\Mail;

use App\SoldadorQualificacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class email extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $soldadorQualificacao;

    public function __construct(
        SoldadorQualificacao $soldadorQualificacao
    )
    {
        $this->soldadorQualificacao = $soldadorQualificacao;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->soldadorQualificacao->tempo < 40) {
            $email = $this->soldadorQualificacao->soldador->empresa->email;
            $nome = $this->soldadorQualificacao->soldador->nome;
            $this->soldadorQualificacao->aviso = 0;
            if ($this->soldadorQualificacao->tempo < 0) {
                $this->soldadorQualificacao->status = "atrasado";
            }
            if ($this->soldadorQualificacao->tempo > 0) {
                $mensagem = "Sua qualificacao irá vencer em " . $this->soldadorQualificacao->tempo . " dias!!";
            } elseif ($this->soldadorQualificacao->tempo == 0) {
                $mensagem = "Sua qualificacao vence hoje !!";
            } else {
                $mensagem = "Sua qualificacao venceu há " . ($this->soldadorQualificacao->tempo * -1) . " dias!!";

            }
            $this->soldadorQualificacao->save();
            $this->subject("SUA QUALIFICACAO ESTÁ PRESTES A VENCER");
            $this->cc("treinasolda@infosolda.com.br","Treina Solda");
            $this->cc("tsi.soldagem@gmail.com","TSI SOLDAGEM");
            $this->to($email, $nome);
            return $this->markdown('mail.email')->with(["dado" => $this->soldadorQualificacao, "mensagem" => $mensagem]);
        }
    }
}

