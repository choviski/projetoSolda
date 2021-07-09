<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email5 extends Mailable
{
    use Queueable, SerializesModels;
    private $usuario;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\stdClass $usuario)
    {
        $this->usuario=$usuario;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject("HÁ UM NOVO CLIENTE INTERESSADO NO APP RASTREA");
        $this->to("wojeicchowskinicholas@gmail.com", "InfoSolda");
        $mensagem="Entre em contato com o cliente pelo email {$this->usuario->email},
        ou pelo telefone {$this->usuario->telefone}.";
        $this->cc("tsi.soldagem@gmail.com","TSI SOLDAGEM");
        return $this->markdown('mail.email5')->with(["mensagem"=>$mensagem]);
    }
}
