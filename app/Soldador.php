<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Soldador extends Model
{
    protected $table="soldadores";
    protected $fillable=["nome","sinete","matricula","email","id_empresa"];
    use SoftDeletes;
    public function empresa(){
        return $this->belongsTo("App\Empresa",'id_empresa','id');
    }
    public function qualificacao(){
        return $this->hasOne("App\SoldadorQualificacao","id_soldador","id");
    }
}
