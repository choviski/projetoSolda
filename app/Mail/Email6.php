<?php

namespace App\Mail;

use http\Env\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email6 extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $usuario=session()->get("Usuario");
        $this->subject("HÁ UM NOVO ACESSO NO SISTEMA RASTREA");
        $this->to("wojeicchowskinicholas@gmail.com", "InfoSolda");
        $mensagem="O usuário {$usuario->nome} acaba de fazer um acesso no sistema Rastrea";

        return $this->markdown('mail.email6')->with(["mensagem"=>$mensagem]);
    }
}
