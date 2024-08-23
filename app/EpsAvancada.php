<?php

namespace App;

use App\Junta;
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
        'notas',
        'rqp',
        'norma',
        'data',
        'informacao_tecnica_id',
        'id_empresa'
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
            'eps_avancada_id',
            'eps_processo_id'
        );

    }
    public function empresa(){
        return $this->belongsTo(
            Empresa::class,
            'id_empresa',
            'id'
        );
    }

    public function quatidadeMetaisAdicao(){
        return $this->processos->sum(function ($processo) {
            return $processo->metaisAdicao->count();
        });
    }

    public function temTIG(){
        foreach ($this->processos as $processo){
            if ($processo->qual_processo=="TIG"){
                return true;
            }
        }
        return false;
    }

    public function juntasUnicas(){
        $processosIds = $this->processos->pluck('id');
        
        return Junta::whereHas('processos', function ($query) use ($processosIds) {
            $query->whereIn('processo_id', $processosIds);
        })->distinct()->get();
    }

    public function maiorQuantidadeAngulosJunta(){
        $juntas = $this->juntasUnicas();

        foreach ($juntas as $junta){
            if ($junta->qtd_angulos == 2){
                return 2;
            }
        }
        return 1;
    }

}
