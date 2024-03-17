<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpsPreAquecimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eps_pre_aquecimentos', function (Blueprint $table) {
            $table->id();
            $table->string('temperatura')->nullable();
            $table->string('temperatura_interpasse')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('eps_pre_aquecimentos');
    }
}
