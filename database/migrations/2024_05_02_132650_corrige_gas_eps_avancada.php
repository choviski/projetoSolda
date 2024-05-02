<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CorrigeGasEpsAvancada extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eps_gases', function (Blueprint $table) {
            $table->string('composicao')->change();
            $table->string('vazao')->change();
            $table->string('composicao_purga')->change();
            $table->string('vazao_purga')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
