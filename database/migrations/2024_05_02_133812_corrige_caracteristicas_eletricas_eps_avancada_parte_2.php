<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CorrigeCaracteristicasEletricasEpsAvancadaParte2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eps_caracteristicas_eletricas', function (Blueprint $table) {
            $table->string('camada_todas_amperes_li')->nullable()->after('polaridade');
            $table->string('camada_todas_amperes_ls')->nullable()->after('camada_todas_amperes_li');
            $table->string('camada_todas_volts_li')->nullable()->after('camada_todas_amperes_ls');
            $table->string('camada_todas_volts_ls')->nullable()->after('camada_todas_volts_li');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eps_caracteristicas_eletricas', function (Blueprint $table) {
            $table->dropColumn('camada_todas_amperes_li');
            $table->dropColumn('camada_todas_amperes_ls');
            $table->dropColumn('camada_todas_volts_li');
            $table->dropColumn('camada_todas_volts_ls');
        });
    }
}
