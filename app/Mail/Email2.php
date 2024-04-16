<?php

namespace App\Mail;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email2 extends Mailable
{
    use Queueable, SerializesModels;
    private $usuario;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Usuario $usuario)
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
        $this->subject("SUA CONTA FOI CRIADA NO SISTEMA DA INFOSOLDA");
        $this->to("{$this->usuario->email}", "{$this->usuario->nome}");
        return $this->markdown('mail.email2')->with(["dado"=>$this->usuario]);
    }


}

