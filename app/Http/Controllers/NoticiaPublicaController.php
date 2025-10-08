<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaPublicaController extends Controller
{
    /**
     * Página com todas as notícias publicadas.
     */
public function index(Request $request)
{
    $query = Noticia::where('status', 'publicada');

    if ($request->filled('categoria')) {
        $query->where('categoria', $request->categoria);
    }

    $noticias = $query->orderBy('data_publicacao', 'desc')->paginate(6);

    $categorias = Noticia::whereNotNull('categoria')->distinct()->pluck('categoria');

    return view('noticias.noticias-index', compact('noticias', 'categorias'));
}


    /**
     * Página de uma notícia completa.
     */
    public function show($id)
    {
        // Busca apenas notícias publicadas
        $noticia = Noticia::where('status', 'publicada')->findOrFail($id);

        // Busca até 3 notícias relacionadas, exceto a atual
        $relacionadas = Noticia::where('status', 'publicada')
            ->where('id', '!=', $noticia->id)
            ->orderBy('data_publicacao', 'desc')
            ->take(3)
            ->get();

        // registra page view para esta rota
        try {
            \App\Models\PageView::firstOrCreate(['path' => "noticias/{$id}"])->increment('view_count');
        } catch (\Throwable $e) {
            // silently ignore
        }

        return view('noticias.noticia-show', compact('noticia', 'relacionadas'));
    }
}
