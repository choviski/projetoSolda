<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gas extends Model
{
    use SoftDeletes;

    protected $table = 'eps_gases';

    protected $fillable = [
        'gas_protecao',
        'artigo',
        'composicao',
        'vazao',
        'possui_purga',
        'purga',
        'composicao_purga',
        'vazao_purga'
    ];

    public function processo(): HasOne
    {
        return $this->hasOne(EpsProcesso::class, 'eps_gas_id');
    }
}
