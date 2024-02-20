<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tecnico extends Model
{
    use SoftDeletes;

    protected $table = 'eps_informacoes_tecnicas';
    protected $fillable = [
        'goivagem',
        'martelamento',
        'cordoes',
        'eletrodo',
        'espacamento_eletrodo',
        'unidade_medida_espacamento',
        'diametro_bocal',
        'unidade_medida_bocal',
        'limpeza',
        'tipo_passe',
        'oscilacao',
        'passes_simples_multiplos',
        'processo_termico',
        'inspecao_final',
    ];

    public function eps(): HasOne
    {
        return $this->hasOne(EpsAvancada::class, 'informacao_tecnica_id');
    }
}
