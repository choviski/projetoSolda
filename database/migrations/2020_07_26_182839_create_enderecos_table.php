<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("rua");
            $table->string("bairro");
            $table->string("complemento")->nullable();
            $table->string("cep",9);
            $table->integer("numero");
            $table->unsignedBigInteger("id_cidade");
            $table->foreign("id_cidade")->references("id")->on("cidades");
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
        Schema::dropIfExists('enderecos');
    }
}
