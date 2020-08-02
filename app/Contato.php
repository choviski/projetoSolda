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
    public function phoneNumber() {
        // add logic to correctly format number here
        // a more robust ways would be to use a regular expression
        $data ="";
        return "(".substr($data, 0, 3).") ".substr($data, 3, 3)." ".substr($data,6);
    }
}
