<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CorrigeCaracteristicasEletricasEpsAvancada extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eps_caracteristicas_eletricas', function (Blueprint $table) {
            $table->string('diametro_eletrodo_tig')->change();
            $table->string('camada')->nullable()->change();
            $table->string('polaridade')->nullable()->change();

            $table->integer('camada_raiz_amperes_li')->nullable()->after('polaridade');
            $table->integer('camada_raiz_amperes_ls')->nullable()->after('camada_raiz_amperes_li');
            $table->integer('camada_raiz_volts_li')->nullable()->after('camada_raiz_amperes_ls');
            $table->integer('camada_raiz_volts_ls')->nullable()->after('camada_raiz_volts_li');

            $table->integer('camada_acabamento_amperes_li')->nullable()->after('camada_raiz_volts_ls');
            $table->integer('camada_acabamento_amperes_ls')->nullable()->after('camada_acabamento_amperes_li');
            $table->integer('camada_acabamento_volts_li')->nullable()->after('camada_acabamento_amperes_ls');
            $table->integer('camada_acabamento_volts_ls')->nullable()->after('camada_acabamento_volts_li');

            $table->integer('camada_enchimento_amperes_li')->nullable()->after('camada_acabamento_volts_ls');
            $table->integer('camada_enchimento_amperes_ls')->nullable()->after('camada_enchimento_amperes_li');
            $table->integer('camada_enchimento_volts_li')->nullable()->after('camada_enchimento_amperes_ls');
            $table->integer('camada_enchimento_volts_ls')->nullable()->after('camada_enchimento_volts_li');

            $table->dropColumn('amperes');
            $table->dropColumn('volts');
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
            $table->integer('amperes');
            $table->integer('volts');
            $table->integer('polaridade');

            $table->dropColumn([
                'camada_raiz_amperes_li',
                'camada_raiz_amperes_ls',
                'camada_raiz_volts_li',
                'camada_raiz_volts_ls',
                'camada_acabamento_amperes_li',
                'camada_acabamento_amperes_ls',
                'camada_acabamento_volts_li',
                'camada_acabamento_volts_ls',
                'camada_enchimento_amperes_li',
                'camada_enchimento_amperes_ls',
                'camada_enchimento_volts_li',
                'camada_enchimento_volts_ls',
            ]);

            $table->string('camada')->change();
        });
    }
}
