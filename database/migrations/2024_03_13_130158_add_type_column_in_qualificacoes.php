<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeColumnInQualificacoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('qualificacoes', function (Blueprint $table) {
            $table->string('tipo_eps')->after('id_eps')->nullable(); // Altere 'alguma_coluna_existente' para o nome de uma coluna existente na tabela, ou altere 'after' para mudar a posição da nova coluna
        });
        DB::table('qualificacoes')->update(['tipo_eps' => 'App\Eps']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qualificacoes', function (Blueprint $table) {
            $table->dropColumn('tipo_eps');
        });
    }
}
