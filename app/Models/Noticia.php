<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Concerns\HasPortal;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;
    use HasPortal;

    protected $fillable = [
        'titulo',
        'resumo',
        'conteudo',
        'imagem',
        'status',
        'data_publicacao',
        'categoria',
    ];

    protected $casts = [
        'data_publicacao' => 'datetime',
    ];


}
