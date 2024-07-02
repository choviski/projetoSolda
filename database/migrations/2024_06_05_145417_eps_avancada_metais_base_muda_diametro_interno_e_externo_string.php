<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EpsAvancadaMetaisBaseMudaDiametroInternoEExternoString extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eps_materiais', function (Blueprint $table) {
            $table->string('diametro_interno_tubo')->change();
            $table->string('diametro_externo_tubo')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
