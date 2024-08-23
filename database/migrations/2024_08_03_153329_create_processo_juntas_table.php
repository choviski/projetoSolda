<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessoJuntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processo_juntas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('junta_id')->references('id')->on('eps_juntas');
            $table->foreignId('processo_id')->references('id')->on('eps_processos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('processo_juntas');
    }
}
