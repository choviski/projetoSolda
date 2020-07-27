<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_contatos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("id_contato");
            $table->foreign("id_contato")->references("id")->on("contatos");
            $table->unsignedBigInteger("id_empresa");
            $table->foreign("id_empresa")->references("id")->on("empresas");
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
        Schema::dropIfExists('empresa_contatos');
    }
}
