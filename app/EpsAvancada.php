<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class EpsAvancada extends Model
{
    use SoftDeletes;

    protected $table = 'eps_avancadas';

    protected $fillable = [
        'nome',
        'data',
        'informacao_tecnica_id'
    ];

    public function informacaoTecnica(): BelongsTo
    {
        return $this->belongsTo(Tecnico::class, 'informacao_tecnica_id');
    }

    public function processos(): BelongsToMany
    {
        return $this->belongsToMany(
            EpsProcesso::class,
            'eps_avancadas_processos',
            'eps_processo_id'
        );
    }
}
