<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpsProcessosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('eps_processos')) {
            Schema::create('eps_processos', function (Blueprint $table) {
                $table->id();
                $table->string('nome');
                $table->string('tipo');
                $table->string('qual_processo');
                $table->foreignId('eps_gas_id')->nullable()->constrained()->references('id')->on('eps_gases');
                $table->foreignId('eps_junta_id')->nullable()->constrained();
                $table->foreignId('eps_posicao_soldagem_id')->nullable()->constrained()->references('id')->on('eps_posicao_soldagem');
                $table->foreignId('eps_caracteristicas_eletrica_id')->nullable()->constrained();
                $table->foreignId('eps_pre_aquecimento_id')->nullable()->constrained();
                $table->foreignId('eps_pos_aquecimento_id')->nullable()->constrained();

                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eps_processos');
    }
}
