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
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $qualificacaos = SoldadorQualificacao::where("criado",1)->select(DB::raw("*,(TIMESTAMPDIFF(day,now(),validade_qualificacao)) as tempo
   "))->orderBy('validade_qualificacao', 'desc')->where("aviso","=",1)->get();
        foreach ($qualificacaos as $qualificacao) {
            if ($qualificacao->tempo < 40) {
                $email = $qualificacao->soldador->empresa->email;
                $nome = $qualificacao->soldador->nome;
                $qualificacao->aviso = 0;
                if($qualificacao->tempo<0){
                    $qualificacao->status="atrasado";
                }
                if($qualificacao->tempo>0){
                    $mensagem="Sua qualificacao irá vencer em " .$qualificacao->tempo." dias!!";
                }elseif ($qualificacao->tempo==0){
                    $mensagem="Sua qualificacao vence hoje !!";
                }else{
                    $mensagem="Sua qualificacao venceu há " .($qualificacao->tempo*-1)." dias!!";

                }
                $qualificacao->save();
                $this->subject("SUA QUALIFICACAO ESTÁ PRESTES A VENCER");
                $this->cc("infosolda@infolda.com.br","infosolda");
                $this->cc("tsi.soldagem@gmail.com","TSI SOLDAGEM");
                $this->to("$email", "$nome");
                return $this->markdown('mail.email')->with(["dado"=>$qualificacao,"mensagem"=>$mensagem]);
            }
        }
    }
}

