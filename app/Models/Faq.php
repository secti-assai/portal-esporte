<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\HasPortal;

class Faq extends Model
{
    use HasFactory;
    use HasPortal;

    protected $fillable = [
        'pergunta',
        'resposta',
        'ordem',
        'portal',
    ];
}
