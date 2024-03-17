<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaracteristicaEletrica extends Model
{
    use SoftDeletes;

    protected $table = 'eps_caracteristicas_eletricas';

    protected $fillable = [
        'tipo_corrente',
        'modo_transferencia',
        'artigo',
        'polaridade',
        'amperes',
        'volts',
        'velocidade',
        'camada',
        'tig',
        'diametro_eletrodo_tig',
        'classificacao_consumivel_tig',
    ];

    public function processo(): HasOne
    {
        return $this->hasOne(EpsProcesso::class, 'eps_caracteristicas_eletrica_id');
    }
}
