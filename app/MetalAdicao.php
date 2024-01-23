<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class MetalAdicao extends Model
{
    use SoftDeletes;

    protected $table = 'eps_metais';
    protected $fillable = [
        'eps_processo_id',
        'f_numero',
        'a_numero',
        'diametro_consumivel',
        'metal_depositado',
        'possui_metal_suplementar',
        'metal_suplementar',
        'marca_material',
        'classificacao_aws',
        'forma_consumivel',
    ];

    public function processos(): BelongsTo
    {
        return $this->belongsTo(EpsProcesso::class, 'eps_processo_id');
    }
}
