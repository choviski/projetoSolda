<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->integer("cnpj");
            $table->string("nome_fantasia")->nullable();
            $table->string("razao_social");
            $table->integer("telefone");
            $table->string("email",100)->unique();
            $table->unsignedBigInteger("id_endereco");
            $table->foreign("id_endereco")->references("id")->on("enderecos");
            $table->unsignedBigInteger("id_inspetor");
            $table->foreign("id_inspetor")->references("id")->on("inspetores");
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
        Schema::dropIfExists('empresas');
    }
}
