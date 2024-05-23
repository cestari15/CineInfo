<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'diretor',
        'genero',
        'dt_lancamento',
        'sinopse',
        'classificacao',
        'plataformas',
        'episodios',
        'studio'
    ];
}
