<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class EpsProcesso extends Model
{
    use SoftDeletes;

    protected $table = 'eps_processos';

    protected $fillable = [
        'nome',
        'tipo',
        'qual_processo',
        'eps_gas_id',
        'eps_junta_id',
        'eps_caracteristicas_eletrica_id',
        'eps_pre_aquecimento_id',
        'eps_pos_aquecimento_id',
    ];

    public function gas(): BelongsTo
    {
        return $this->belongsTo(Gas::class, 'eps_gas_id');
    }

    public function junta(): BelongsTo
    {
        return $this->belongsTo(Junta::class, 'eps_junta_id');
    }

    public function caracteristicasEletricas(): BelongsTo
    {
        return $this->belongsTo(CaracteristicaEletrica::class, 'eps_caracteristicas_eletrica_id');
    }

    public function preAquecimento(): BelongsTo
    {
        return $this->belongsTo(PreAquecimento::class, 'eps_pre_aquecimento_id');
    }

    public function posAquecimento(): BelongsTo
    {
        return $this->belongsTo(PosAquecimento::class, 'eps_pos_aquecimento_id');
    }

    public function metaisAdicao(): HasMany
    {
        return $this->hasMany(MetalAdicao::class, 'eps_processo_id');
    }

    public function materiaisBases(): HasMany
    {
        return $this->hasMany(MaterialBase::class, 'eps_processo_id');
    }

    public function eps(): BelongsToMany
    {
        return $this->belongsToMany(
            EpsAvancada::class,
            'eps_avancadas_processos',
            'eps_processo_id',
            'eps_avancada_id'
        );
    }
}
