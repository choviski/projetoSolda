<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CorrigeEpsProcesso extends Migration
{
    public function up()
    {
        Schema::table('eps_processos', function (Blueprint $table) {
            if (Schema::hasColumn('eps_processos', 'nome')) {
                $table->dropColumn('nome');
            }
        });
    }

    public function down()
    {
        Schema::table('eps_processos', function (Blueprint $table) {
            $table->string('nome')->nullable();
        });
    }
}
