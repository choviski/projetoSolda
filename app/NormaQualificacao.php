<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NormaQualificacao extends Model
{
    protected $table="norma_qualificacoes";
    protected $fillable=["id_norma","id_qualificacao"];
    public function norma(){
        return $this->belongsTo("App\Norma",'id_norma','id');
    }
    public function qualificacao(){
        return $this->belongsTo("App\Qualificacao",'id_qualificacao','id');
    }
    use SoftDeletes;
}
