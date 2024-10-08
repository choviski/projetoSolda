<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTecnicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('eps_informacoes_tecnicas')) {
            Schema::create('eps_informacoes_tecnicas', function (Blueprint $table) {
                $table->id();
                $table->string('goivagem')->nullable();
                $table->string('martelamento')->nullable();
                $table->string('cordoes')->nullable();
                $table->string('eletrodo')->nullable();
                $table->string('espacamento_eletrodo')->nullable();
                $table->string('unidade_medida_espacamento')->nullable();
                $table->float('diametro_bocal')->nullable();
                $table->string('unidade_medida_bocal')->nullable();
                $table->string('limpeza')->nullable();
                $table->string('tipo_passe')->nullable();
                $table->string('passes_simples_multiplos')->nullable();
                $table->string('oscilacao')->nullable();
                $table->string('processo_termico')->nullable();
                $table->string('inspecao_final')->nullable();

                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('eps_informacoes_tecnicas');
    }
}
