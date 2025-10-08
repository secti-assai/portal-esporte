<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\HasPortal;

class Legislacao extends Model
{
    use HasFactory;
    use HasPortal;

    protected $table = 'legislacoes';

    protected $fillable = [
        'titulo',
        'descricao',
        'arquivo',
        'data_publicacao',
        'portal',
    ];

    protected $casts = [
        'data_publicacao' => 'date',
    ];
}
