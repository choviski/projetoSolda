<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Eps extends Model
{
    protected $table ="eps";
    protected $fillable = ['nome','criado','id_empresa'];
    use SoftDeletes;
    public function arquivo(){
        return $this->hasOne('App\Arquivo', 'id_eps','id');
    }
    // public function qualificacao(){
    //     return $this->hasOne('App\Qualificacao', 'id_eps','id');
    // }
    public function empresa(){
        return $this->belongsTo("App\Empresa",'id_empresa','id');
    }
}
