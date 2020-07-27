<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contato extends Model
{
    protected $table="contatos";
    protected $fillable = ["nome","telefone","email"];
    use SoftDeletes;
    public function empresa(){
        return $this->hasOne('App\EmpresaContato', 'id_contato','id');
    }
}
