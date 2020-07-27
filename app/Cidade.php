<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cidade extends Model
{
    protected $table ="cidades";
    protected $fillable = ['nome','estado'];
    public function endereco(){
        return $this->hasOne('App\Endereco', 'id_cidade','id');
    }
    use SoftDeletes;
}
