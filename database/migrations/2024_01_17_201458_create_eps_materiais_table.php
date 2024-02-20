<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpsMateriaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eps_materiais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('eps_processo_id')->constrained();
            $table->integer('p_numero')->nullable();
            $table->integer('grupo_n')->nullable();
            $table->string('tipo_grau')->nullable();
            $table->string('metal_base')->nullable();
            $table->float('chanfro')->nullable();
            $table->string('unidade_medida_chanfro')->nullable();
            $table->boolean('tubo_ou_chapa')->nullable();
            $table->boolean('espessura')->nullable();
            $table->float('diametro_interno_tubo')->nullable();
            $table->float('diametro_externo_tubo')->nullable();
            $table->string('angulo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('eps_materiais');
    }
}
