<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certificado extends Model
{
    protected $table="certificados";
    protected $fillable = ['caminho','id_requalificacao'];
    use SoftDeletes;
    public function requalificacao(){
        return $this->belongsTo("App\SoldadorQualificacao",'id_requalificacao','id');
    }
}
