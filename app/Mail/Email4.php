<?php

namespace App\Mail;

use App\SoldadorQualificacao;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email4 extends Mailable
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
        $this->subject("HÁ UM NOVO REQUERIMENTO DE REQUALIFICAÇÃO!");
        $this->to("wojeicchowskinicholas@gmail.com", "InfoSolda");
            $mensagem="A requalificação {$this->qualificacao->qualificacao->cod_eps}, do Soldador, {$this->qualificacao->soldador->nome}
            está disponível para avaliação";
        return $this->markdown('mail.email4')->with(["mensagem"=>$mensagem,"dado"=>$this->qualificacao]);
    }


}