<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo',
        'genero',
        'imagem',
        'descricao',
        'classificacao',
        'sala',
        'horario',
        'duracao',
        'data_inicio',
        'data_fim',
    ];
}