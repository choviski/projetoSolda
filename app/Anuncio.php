<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int id
 * @property string $nome
 * @property string $link
 * @property string $imagem_vertical
 * @property string $imagem_horizontal
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Anuncio extends Model
{
    use SoftDeletes;

    protected $table = 'anuncios';

    protected $fillable = [
        'nome',
        'link',
        'imagem_vertical',
        'imagem_horizontal',
    ];

}
