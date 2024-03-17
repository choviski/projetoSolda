<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpsPosAquecimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eps_pos_aquecimentos', function (Blueprint $table) {
            $table->id();
            $table->float('faixa_temperatura')->nullable();
            $table->float('taxa_aquecimento')->nullable();
            $table->float('tempo_permanencia')->nullable();
            $table->float('taxa_resfriamento')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('eps_pos_aquecimentos');
    }
}
