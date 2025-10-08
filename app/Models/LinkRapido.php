<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\HasPortal;

class LinkRapido extends Model
{
    use HasFactory;
    use HasPortal;

    protected $fillable = [
        'titulo',
        'descricao_curta',
        'url',
        'icone',
        'portal',
    ];
}
