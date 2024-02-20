<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpsMetaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eps_metais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('eps_processo_id')->constrained();
            $table->integer('f_numero')->nullable();
            $table->integer('a_numero')->nullable();
            $table->float('diametro_consumivel')->nullable();
            $table->string('metal_depositado')->nullable();
            $table->boolean('possui_metal_suplementar')->nullable();
            $table->string('metal_suplementar')->nullable();
            $table->string('marca_material')->nullable();
            $table->string('classificacao_aws')->nullable();
            $table->string('forma_consumivel')->nullable();
            $table->string('marca_consumivel')->nullable();
            $table->string('suporte')->nullable();
            $table->string('material_suporte')->nullable();

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
        Schema::dropIfExists('eps_metais');
    }
}
