<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpsAvancadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eps_avancadas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('notas');
            $table->date('data');
            $table->string('rqp');
            $table->string('norma');
            $table->foreignId('informacao_tecnica_id')->constrained()->references('id')->on('eps_informacoes_tecnicas');
            $table->foreignId('id_empresa')->nullable()->constrained()->references('id')->on('empresas');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eps_avancadas');
    }
}
