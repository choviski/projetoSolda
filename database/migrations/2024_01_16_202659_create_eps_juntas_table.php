<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpsJuntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('eps_juntas')) {
            Schema::create('eps_juntas', function (Blueprint $table) {
                $table->id();
                $table->string('imagem')->nullable();
                $table->string('unidade_medida_cotas')->nullable();
                $table->float('cota_t')->nullable();
                $table->float('cota_r')->nullable();
                $table->float('cota_f')->nullable();
                $table->float('angulo_primario')->nullable();
                $table->float('angulo_secundario')->nullable();
                $table->boolean('possui_cobre_junta')->nullable();
                $table->string('material_cobre_junta')->nullable();
                $table->string('retentores')->nullable();
                $table->float('abertura_raiz')->nullable();
                $table->timestamps();
                $table->softDeletes();
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
        Schema::dropIfExists('eps_juntas');
    }
}
