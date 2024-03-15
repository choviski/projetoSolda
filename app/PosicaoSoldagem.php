<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class PosicaoSoldagem extends Model
{
    use SoftDeletes;

    protected $table = 'eps_posicao_soldagem';
    protected $fillable = [
        'posicao_soldagem',
        'artigo',
        'direcao_soldagem',
    ];

    public function processo(): HasOne
    {
        return $this->hasOne(EpsProcesso::class, 'eps_posicao_soldagem_id');
    }
}
