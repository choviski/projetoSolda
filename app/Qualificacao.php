<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Qualificacao extends Model
{
    protected $table="qualificacoes";
    protected $fillable=["id_processo","cod_eps","descricao"];
    use SoftDeletes;
    public function norma(){
        return $this->hasOne('App\NormaQualificacao', 'id_qualificacao','id');
    }
    public function soldador(){
        return $this->hasOne("App\SoldadorQualificacao","id_qualificacao","id");
    }
    public function processo(){
        return $this->belongsTo("App\Processo",'id_processo','id');
    }
}
