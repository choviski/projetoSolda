<?php

use App\Usuario;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RefatorDatabaseToAccessCompanyByMultiplesUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->unsignedBigInteger("id_empresa")->nullable()->after("tipo");
        });

        $usuarios = Usuario::all();
        foreach ($usuarios as $usuario){
            $empresa = \App\Empresa::where('id_usuario',$usuario->id)->first();
            if($empresa) {
                $usuario->id_empresa = $empresa->id;
                $usuario->save();
            }
        }

        Schema::table('empresas', function (Blueprint $table) {
            $table->dropForeign(['id_usuario']);
            $table->dropColumn('id_usuario');
        });

        Schema::table('usuarios', function (Blueprint $table) {
            $table->foreign("id_empresa")->references("id")->on("empresas");
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
