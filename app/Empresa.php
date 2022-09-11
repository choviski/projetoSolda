<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    protected $table="empresas";
    protected $fillable=["cnpj","razao_social","nome_fantasia","telefone","email","id_inspetor","id_endereco","foto"];
    use SoftDeletes;

    public function endereco(){
        return $this->belongsTo("App\Endereco",'id_endereco','id');
    }
    public function inspetor(){
        return $this->belongsTo("App\Inspetor",'id_inspetor','id');
    }
    public function usuario(){
        return $this->hasMany("App\Usuario",'id_empresa','id');
    }
    public function contato(){
        return $this->hasOne('App\EmpresaContato', 'id_empresa','id');
    }
}
