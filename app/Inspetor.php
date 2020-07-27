<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inspetor extends Model
{
    protected $table="inspetores";
    protected $fillable = ['nome','crea','funcao'];
    use SoftDeletes;
    public function empresa(){
        return $this->hasOne('App\Empresa', 'id_inspetor','id');
    }
}
