<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Junta extends Model
{
    use SoftDeletes;

    protected $table = 'eps_juntas';

    protected $fillable = [
        'imagem',
        'unidade_medida_cotas',
        'cota_t',
        'cota_r',
        'cota_f',
        'angulo_primario',
        'angulo_secundario',
        'possui_cobre_junta',
        'material_cobre_junta',
        'retentores',
        'abertura_raiz',
    ];

    public function processo(): HasOne
    {
        return $this->hasOne(EpsProcesso::class, 'eps_jnuta_id');
    }
}