<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Acesso extends Model
{
    protected $table="acessos";
    protected $fillable = ['id_usuario'];
    use SoftDeletes;
    public function usuario(){
        return $this->belongsTo("App\Usuario",'id_usuario','id');
    }
}