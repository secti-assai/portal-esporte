<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'resumo',
        'conteudo',
        'imagem',
        'status',
        'data_publicacao',
    ];

    protected $casts = [
        'data_publicacao' => 'datetime',
    ];
    public function categoria()
{
    return $this->belongsTo(Categoria::class);
}

}
