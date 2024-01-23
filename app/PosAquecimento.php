<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class PosAquecimento extends Model
{
    use SoftDeletes;

    protected $table = 'eps_pos_aquecimentos';
    protected $fillable = [
        'faixa_temperatura',
        'taxa_aquecimento',
        'tempo_permanencia',
        'taxa_resfriamento',
    ];

    public function processo(): HasOne
    {
        return $this->hasOne(EpsProcesso::class, 'eps_pos_aquecimento_id');
    }
}
