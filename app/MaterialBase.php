<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaterialBase extends Model
{
    use SoftDeletes;

    protected $table = 'eps_materiais';
    protected $fillable = [
        'eps_processo_id',
        'p_numero',
        'grupo_n',
        'tipo_grau',
        'metal_base',
        'chanfro',
        'unidade_medida_chanfro',
        'tubo_ou_chapa',
        'espessura',
        'diametro_interno_tubo',
        'diametro_externo_tubo',
        'angulo',
    ];

    public function processos(): BelongsTo
    {
        return $this->belongsTo(EpsProcesso::class, 'eps_processo_id');
    }
}
