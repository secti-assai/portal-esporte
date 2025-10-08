<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;

    protected $table = 'locais';

    protected $fillable = [
        'nome',
        'endereco',
        'mapa_url',
        'telefone',
        'horario_funcionamento',
        'servicos_oferecidos',
    ];
}