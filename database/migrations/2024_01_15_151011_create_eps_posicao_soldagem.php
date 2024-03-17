<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpsPosicaoSoldagem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        if (!Schema::hasTable('eps_posicao_soldagem')) {
            Schema::create('eps_posicao_soldagem', function (Blueprint $table) {
                $table->id();
                $table->string("posicao_soldagem");
                $table->string("direcao_soldagem");
                $table->timestamps();
                $table->softDeletes();
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
        Schema::dropIfExists('eps_posicao_soldagem');
    }
}
