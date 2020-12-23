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
            $table->string("sinete",100)->unique();
            $table->string("matricula",100)->unique();
            $table->string("email",100)->unique()->nullable();
            $table->boolean("aviso");
            $table->enum("status",['qualificado','em-processo','atrasado','nao-qualificado']);
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
