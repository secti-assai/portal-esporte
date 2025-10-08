<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageView;
use App\Models\Noticia;
use App\Models\Evento;
use App\Models\Categoria;
use App\Models\Local;
use App\Models\LinkRapido;
use App\Models\Faq;
use App\Models\Legislacao;
use App\Models\MembroEquipe;
use App\Models\User;

class StatsController extends Controller
{
    // Retorna contagens gerais
    public function totals()
    {
        return response()->json([
            'users' => User::count(),
            'noticias' => Noticia::count(),
            'eventos' => Evento::count(),
            'categorias' => Categoria::count(),
            'locais' => Local::count(),
            'links_rapidos' => LinkRapido::count(),
            'faqs' => Faq::count(),
            'legislacoes' => Legislacao::count(),
            'membros_equipe' => MembroEquipe::count(),
            'page_views_total' => PageView::sum('view_count'),
        ]);
    }

    // Retorna a view de estatísticas (dashboard BI)
    public function index()
    {
        return view('admin.stats');
    }

    // Top páginas por visualizações
    public function topPages(Request $request)
    {
        $limit = intval($request->query('limit', 10));
        $data = PageView::orderBy('view_count', 'desc')
            ->take($limit)
            ->get(['path', 'view_count']);

        return response()->json($data);
    }

    // Série de views por dia (últimos N dias)
    public function viewsOverTime(Request $request)
    {
        $days = intval($request->query('days', 30));

        $result = [];
        for ($i = $days - 1; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $count = PageView::whereDate('created_at', $date)->sum('view_count');
            $result[] = ['date' => $date, 'views' => $count];
        }

        return response()->json($result);
    }
}
