<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Arquivo extends Model
{
    protected $table="arquivos";
    protected $fillable = ['caminho','id_eps'];
    use SoftDeletes;
    public function eps(){
        return $this->belongsTo("App\Eps",'id_eps','id');
    }
}