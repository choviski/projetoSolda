<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SoldadorQualificacao extends Model
{
    protected $table="soldador_qualificacoes";
    protected $fillable=["id_soldador","cod_rqs","id_qualificacao","data_qualificacao","status","validade_qualificacao","lancamento_qualificacao","nome_certificado","caminho_certificado","posicao","eletrodo","foto","texto","aviso","nome_testemunha","cpf_testemunha"];
    public function soldador(){
        return $this->belongsTo("App\Soldador",'id_soldador','id');
    }
    public function qualificacao(){
        return $this->belongsTo("App\Qualificacao",'id_qualificacao','id');
    }
    public function foto(){
        return $this->hasOne('App\Foto', 'id_requalificacao','id');
    }
    public function certificado(){
        return $this->hasOne('App\Certificado', 'id_requalificacao','id');
    }
    use SoftDeletes;
}
