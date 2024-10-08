<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualificacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualificacoes', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("id_processo");
            $table->foreign("id_processo")->references("id")->on("processos");
            $table->unsignedBigInteger("id_eps");
            $table->foreign("id_eps")->references("id")->on("eps");
            $table->text("descricao");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qualificacaos');
    }
}
