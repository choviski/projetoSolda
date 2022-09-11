<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    protected $table="usuarios";
    protected $fillable=["nome","email","senha","tipo","id_empresa"];

    public function empresa(){
        return $this->belongsTo('App\Empresa', 'id_empresa','id');
    }

    public function usuario(){
        return $this->hasOne("App\Usuario",'id_usuario','id');
    }

    use SoftDeletes;
}
