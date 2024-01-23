<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class PreAquecimento extends Model
{
    use SoftDeletes;

    protected $table = 'eps_pre_aquecimentos';
    protected $fillable = [
        'temperatura',
        'temperatura_interpasse',
    ];

    public function processo(): HasOne
    {
        return $this->hasOne(EpsProcesso::class, 'eps_pre_aquecimento_id');
    }
}
