<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpsGasesTable extends Migration
{

    public function up()
    {
        if (!Schema::hasTable('eps_gases')) {
            Schema::create('eps_gases', function (Blueprint $table) {
                $table->id();
                $table->string('gas_protecao');
                $table->float('composicao');
                $table->float('vazao');
                $table->boolean('possui_purga');
                $table->string('purga')->nullable();
                $table->float('composicao_purga')->nullable();
                $table->float('vazao_purga')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('eps_gases');
    }
}
