<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Foto extends Model
{
    protected $table="fotos";
    protected $fillable = ['caminho','id_requalificacao'];
    use SoftDeletes;
    public function requalificacao(){
        return $this->belongsTo("App\SoldadorQualificacao",'id_requalificacao','id');
    }
}
