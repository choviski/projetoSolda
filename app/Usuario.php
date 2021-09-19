<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    protected $table="usuarios";
    protected $fillable=["nome","email","senha","tipo"];
    public function empresa(){
        return $this->hasOne('App\Empresa', 'id_usuario','id');
    }
    public function usuario(){
        return $this->hasOne("App\Usuario",'id_usuario','id');
    }
    use SoftDeletes;
}
