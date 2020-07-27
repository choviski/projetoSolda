<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Norma extends Model
{
    protected $table = "normas";
    protected $fillable = ["nome","descricao","validade"];
    use SoftDeletes;
    public function qualificacao(){
        return $this->hasOne('App\NormaQualificacao', 'id_norma','id');
    }
}
