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
    $q = trim($request->query('q', ''));

    $query = Noticia::where('status', 'publicada');

    if ($q !== '') {
        // escape LIKE wildcards
        $escaped = str_replace(['\\', '%', '_'], ['\\\\', '\\%', '\\_'], mb_strtolower($q));
        $like = "%{$escaped}%";

        $query->where(function($sub) use ($like) {
            $sub->whereRaw('LOWER(titulo) LIKE ?', [$like])
                ->orWhereRaw('LOWER(resumo) LIKE ?', [$like])
                ->orWhereRaw('LOWER(conteudo) LIKE ?', [$like]);
        });
    }

    $noticias = $query->orderBy('data_publicacao', 'desc')->paginate(9)->withQueryString();

    return view('noticias.noticias-index', compact('noticias', 'q'));
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
