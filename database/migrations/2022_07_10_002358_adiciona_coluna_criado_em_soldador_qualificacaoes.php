<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdicionaColunaCriadoEmSoldadorQualificacaoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('soldador_qualificacoes', function($table) {
            if(!Schema::hasColumn('soldador_qualificacoes', 'criado')){
                $table->string('criado')->default(1)->after('caminho_instrucao');
            }   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('soldador_qualificacoes', function($table) {
            $table->dropColumn('criado');
        });
    }
}
