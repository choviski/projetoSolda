<?php

use App\EpsProcesso;
use App\Processo;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddDataInProcessoJuntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $processos = EpsProcesso::whereNotNull('eps_junta_id')->get();

        foreach ($processos as $processo) {
            DB::table('processo_juntas')->insert([
                'processo_id' => $processo->id,
                'junta_id' => $processo->eps_junta_id
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('processo_juntas')->delete();
    }
}
