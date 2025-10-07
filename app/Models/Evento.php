<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'local',
        'data_evento',
        'descricao',
    ];

    protected $casts = [
        'data_evento' => 'datetime',
    ];
}