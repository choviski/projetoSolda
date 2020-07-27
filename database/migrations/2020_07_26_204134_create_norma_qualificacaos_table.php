<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNormaQualificacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('norma_qualificacoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("id_norma");
            $table->foreign("id_norma")->references("id")->on("normas");
            $table->unsignedBigInteger("id_qualificacao");
            $table->foreign("id_qualificacao")->references("id")->on("qualificacoes");
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
        Schema::dropIfExists('norma_qualificacaos');
    }
}
