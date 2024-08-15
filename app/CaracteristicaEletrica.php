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
        'camada_todas_amperes_li',
        'camada_todas_amperes_ls',
        'camada_todas_volts_li',
        'camada_todas_volts_ls',
        'camada_raiz_amperes_li',
        'camada_raiz_amperes_ls',
        'camada_raiz_volts_li',
        'camada_raiz_volts_ls',        
        'camada_acabamento_amperes_li',
        'camada_acabamento_amperes_ls',
        'camada_acabamento_volts_li',
        'camada_acabamento_volts_ls',        
        'camada_enchimento_amperes_li',
        'camada_enchimento_amperes_ls',
        'camada_enchimento_volts_li',
        'camada_enchimento_volts_ls',
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

    public function energiaCamadaTodas(){
        return number_format(
                ((($this->camada_todas_amperes_li + $this->camada_todas_amperes_ls)/2)*
                (($this->camada_todas_volts_li + $this->camada_todas_volts_ls)/2))/
                $this->velocidade,2, ',', ''
            );
    }

    public function energiaCamadaRaiz(){
        return number_format(
            ((($this->camada_raiz_amperes_li + $this->camada_raiz_amperes_ls)/2)*
            (($this->camada_raiz_volts_li + $this->camada_raiz_volts_ls)/2))/
            $this->velocidade,2, ',', ''
        );
    }
    public function energiaCamadaAcabamento(){
        return number_format(
            ((($this->camada_acabamento_amperes_li + $this->camada_acabamento_amperes_ls)/2)*
            (($this->camada_acabamento_volts_li + $this->camada_acabamento_volts_ls)/2))/
            $this->velocidade,2, ',', ''
        );
    }
    public function energiaCamadaEnchimento(){
        return 
        number_format(
            ((($this->camada_enchimento_amperes_li + $this->camada_enchimento_amperes_ls)/2)*
            (($this->camada_enchimento_volts_li + $this->camada_enchimento_volts_ls)/2))/
            $this->velocidade,2, ',', ''
        );
    }
}
