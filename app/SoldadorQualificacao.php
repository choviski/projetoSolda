<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SoldadorQualificacao extends Model
{
    protected $table="soldador_qualificacoes";
    protected $fillable=["id_soldador","id_qualificacao","data_qualificacao", "validade_qualificacao","lancamento_qualificacao","nome_certificado","caminho_certificao"];
    public function soldador(){
        return $this->belongsTo("App\Soldador",'id_soldador','id');
    }
    public function qualificacao(){
        return $this->belongsTo("App\Qualificacao",'id_qualificacao','id');
    }
    use SoftDeletes;
}
