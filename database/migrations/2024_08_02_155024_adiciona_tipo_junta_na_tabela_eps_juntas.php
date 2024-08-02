<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdicionaTipoJuntaNaTabelaEpsJuntas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eps_juntas', function (Blueprint $table) {
            $table->string('tipo_junta')->after('imagem');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eps_juntas', function (Blueprint $table) {
            $table->dropColumn('tipo_junta');
        });
    }
}
