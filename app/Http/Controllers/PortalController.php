<?php

namespace App\Http\Controllers;

use App\Models\Noticia;

class PortalController extends Controller
{
    public function index()
    {
        // Busca apenas as publicadas, em ordem de data
        $noticias = Noticia::where('status', 'publicada')
            ->orderBy('data_publicacao', 'desc')
            ->take(6)
            ->get();

        // Passa a variável para a view
        return view('index', compact('noticias'));
    }

    public function show($id)
    {
        $noticia = Noticia::findOrFail($id);
        return view('noticia', compact('noticia'));
    }
}
