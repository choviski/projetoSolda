<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('eps')) {
            Schema::create('eps', function (Blueprint $table) {
                $table->bigIncrements("id");
                $table->string("nome");
                $table->integer("criado");
                $table->unsignedBigInteger("id_empresa");
                $table->foreign("id_empresa")->references("id")->on("empresas");
                $table->softDeletes();
                $table->timestamps();
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
        Schema::dropIfExists('eps');
    }
}
