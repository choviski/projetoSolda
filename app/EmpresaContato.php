<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpresaContato extends Model
{
    protected $table="empresa_contatos";
    protected $fillable=["id_contato","id_empresa"];
    public function contato(){
        return $this->belongsTo("App\Contato",'id_contato','id');
    }
    public function empresa(){
        return $this->belongsTo("App\Empresa",'id_empresa','id');
    }
}
