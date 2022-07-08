<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdicionaCaminhoInstrucaoEmSoldadorQualificacoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('soldador_qualificacoes', function($table) {
            $table->string('caminho_instrucao')->nullable()->after('caminho_certificado');
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
            $table->dropColumn('caminho_instrucao');
        });
    }
}
