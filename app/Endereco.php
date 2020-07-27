<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endereco extends Model
{
    protected $table ="enderecos";
    protected $fillable = ['rua','bairro','cep','complemento','id_cidade'];
    use SoftDeletes;
    public function empresa(){
        return $this->hasOne('App\Empresa', 'id_endereco','id');
    }
    public function cidade(){
        return $this->belongsTo("App\Cidade",'id_cidade','id');
    }
}
