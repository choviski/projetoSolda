<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoldadorQualificacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soldador_qualificacoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("id_soldador");
            $table->foreign("id_soldador")->references("id")->on("soldadores");
            $table->unsignedBigInteger("id_qualificacao");
            $table->foreign("id_qualificacao")->references("id")->on("qualificacoes");
            $table->date("data_qualificacao");
            $table->date("validade_qualificacao");
            $table->date("lancamento_qualificacao");
            $table->string("nome_certificado");
            $table->string("caminho_certificado");
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
        Schema::dropIfExists('soldador_qualificacaos');
    }
}
