<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdicionaColunaArtigo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eps_juntas', function (Blueprint $table) {
            $table->string('artigo')->nullable()->after('id');
        });
        Schema::table('eps_metais', function (Blueprint $table) {
            $table->string('artigo')->nullable()->after('id');
        });
        Schema::table('eps_materiais', function (Blueprint $table) {
            $table->string('artigo')->nullable()->after('id');
        });
        Schema::table('eps_posicao_soldagem', function (Blueprint $table) {
            $table->string('artigo')->nullable()->after('id');
        });
        Schema::table('eps_pre_aquecimentos', function (Blueprint $table) {
            $table->string('artigo')->nullable()->after('id');
        });
        Schema::table('eps_pos_aquecimentos', function (Blueprint $table) {
            $table->string('artigo')->nullable()->after('id');
        });
        Schema::table('eps_gases', function (Blueprint $table) {
            $table->string('artigo')->nullable()->after('id');
        });
        Schema::table('eps_caracteristicas_eletricas', function (Blueprint $table) {
            $table->string('artigo')->nullable()->after('id');
        });
        Schema::table('eps_informacoes_tecnicas', function (Blueprint $table) {
            $table->string('artigo')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eps_juntas', function (Blueprint $table) {
            $table->dropColumn('artigo');
        });
        Schema::table('eps_metais', function (Blueprint $table) {
            $table->dropColumn('artigo');
        });
        Schema::table('eps_materiais', function (Blueprint $table) {
            $table->dropColumn('artigo');
        });
        Schema::table('eps_posicao_soldagem', function (Blueprint $table) {
            $table->dropColumn('artigo');
        });
        Schema::table('eps_pre_aquecimentos', function (Blueprint $table) {
            $table->dropColumn('artigo');
        });
        Schema::table('eps_pos_aquecimentos', function (Blueprint $table) {
            $table->dropColumn('artigo');
        });
        Schema::table('eps_gases', function (Blueprint $table) {
            $table->dropColumn('artigo');
        });
        Schema::table('eps_caracteristicas_eletricas', function (Blueprint $table) {
            $table->dropColumn('artigo');
        });
        Schema::table('eps_informacoes_tecnicas', function (Blueprint $table) {
            $table->dropColumn('artigo');
        });
    }
}
