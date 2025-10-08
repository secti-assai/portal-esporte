<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\HasPortal;

class MembroEquipe extends Model
{
    use HasFactory;
    use HasPortal;

    protected $fillable = [
        'nome',
        'cargo',
        'foto',
        'email',
        'telefone',
        'ordem',
        'portal',
    ];
}
