<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CorrigeFichaTecnicaEps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eps_informacoes_tecnicas', function (Blueprint $table) {
            $table->string('diametro_bocal')->change();
    
            if (Schema::hasColumn('eps_informacoes_tecnicas', 'unidade_medida_espacamento')) {
                $table->dropColumn('unidade_medida_espacamento');
            }
            if (Schema::hasColumn('eps_informacoes_tecnicas', 'unidade_medida_bocal')) {
                $table->dropColumn('unidade_medida_bocal');
            }
            if (Schema::hasColumn('eps_informacoes_tecnicas', 'tipo_passe ')) {
                $table->dropColumn('tipo_passe');
            }
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
