<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Processo extends Model
{
    protected $table = "processos";
    protected $fillable = ["nome","descricao"];
    use SoftDeletes;
    public function qualificacao(){
        return $this->hasOne('App\Qualificacao', 'id_processo','id');
    }
}
