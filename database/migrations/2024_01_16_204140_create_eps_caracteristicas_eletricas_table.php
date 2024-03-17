<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpsCaracteristicasEletricasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eps_caracteristicas_eletricas', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_corrente')->nullable();
            $table->string('modo_transferencia')->nullable();
            $table->float('polaridade')->nullable();
            $table->float('amperes')->nullable();
            $table->float('volts')->nullable();
            $table->float('velocidade')->nullable();
            $table->integer('camada')->nullable();
            $table->boolean('tig')->nullable();
            $table->float('diametro_eletrodo_tig')->nullable();
            $table->string('classificacao_consumivel_tig')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eps_caracteristicas_eletricas');
    }
}
