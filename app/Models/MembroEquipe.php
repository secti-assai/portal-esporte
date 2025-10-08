<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembroEquipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cargo',
        'foto',
        'email',
        'telefone',
        'ordem',
    ];
}