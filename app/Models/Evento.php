<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\HasPortal;

class Evento extends Model
{
    use HasFactory;
    use HasPortal;

    protected $fillable = [
        'titulo',
        'local',
        'data_evento',
        'descricao',
        'portal',
    ];

    protected $casts = [
        'data_evento' => 'datetime',
    ];
}
