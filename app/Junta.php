<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Junta extends Model
{
    use SoftDeletes;

    protected $table = 'eps_juntas';

    protected $fillable = [
        'imagem',
        'tipo_junta',
        'artigo',
        'necessidade_remocao_retentor',
        'necessidade_remocao_cobre_junta',
        'qtd_angulos',
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

    public function juntas(): BelongsToMany
    {
        return $this->belongsToMany(EpsProcesso::class, 'processo_juntas', 'junta_id', 'processo_id');
    }
}
