<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkRapido extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao_curta',
        'url',
        'icone',
    ];
}