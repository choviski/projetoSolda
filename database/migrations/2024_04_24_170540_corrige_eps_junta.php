<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CorrigeEpsJunta extends Migration
{
    public function up()
    {
        Schema::table('eps_juntas', function (Blueprint $table) {
            // Adicionando novos campos
            $table->string('necessidade_remocao_cobre_junta')->nullable()->after('abertura_raiz');
            $table->string('necessidade_remocao_retentor')->nullable()->after('abertura_raiz');
            $table->integer('qtd_angulos')->nullable()->after('abertura_raiz');
            
            // Alterando os campos para VARCHAR
            $table->string('abertura_raiz')->change();
            $table->string('cota_t')->change();
            $table->string('cota_f')->change();
            $table->string('cota_r')->change();
            $table->string('angulo_primario')->change();
            $table->string('angulo_secundario')->change();

            if (Schema::hasColumn('eps_juntas', 'unidade_medida_cotas')) {
                $table->dropColumn('unidade_medida_cotas');
            }
        });
    }

    public function down()
    {
        Schema::table('eps_junta', function (Blueprint $table) {
            $table->dropColumn('necessidade_remocao_cobre_junta');
            $table->dropColumn('necessidade_remocao_retentor');
            $table->dropColumn('qtd_angulos');
            $table->string('unidade_medida_cotas')->nullable();
        });
    }
}
