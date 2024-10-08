<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoldadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soldadores', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("nome");
            $table->string("sinete");
            $table->string("matricula");
            $table->string("email",100)->nullable();
            $table->string("cpf",14)->unique();
            $table->string("foto")->nullable();
            $table->integer("criado");
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
        Schema::dropIfExists('soldadors');
    }
}
