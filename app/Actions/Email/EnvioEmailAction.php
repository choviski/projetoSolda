<?php

namespace App\Actions\Email;

use App\Mail\Email;
use App\SoldadorQualificacao;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EnvioEmailAction
{
    public static function execute(): void
    {
        /*$qualificacaos = SoldadorQualificacao::select(
            DB::raw("*,(TIMESTAMPDIFF(day,now(),validade_qualificacao)) as tempo")
        )
            ->where('aviso', 1)
            ->orderBy('validade_qualificacao', 'desc')
            ->get();

        foreach ($qualificacaos as $qualificacao) {
            if ($qualificacao->tempo < 40) {
                Mail::send(new Email($qualificacao));
            }
        }*/

        Log::info(print_r('job', true));
    }
}