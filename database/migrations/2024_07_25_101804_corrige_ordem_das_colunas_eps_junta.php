<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CorrigeOrdemDasColunasEpsJunta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE eps_juntas MODIFY COLUMN necessidade_remocao_cobre_junta VARCHAR(255) AFTER abertura_raiz');
        DB::statement('ALTER TABLE eps_juntas MODIFY COLUMN necessidade_remocao_retentor VARCHAR(255) AFTER necessidade_remocao_cobre_junta');
        DB::statement('ALTER TABLE eps_juntas MODIFY COLUMN qtd_angulos INT AFTER necessidade_remocao_retentor');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
