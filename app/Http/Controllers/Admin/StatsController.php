<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\Evento;
use App\Models\Local;
use App\Models\LinkRapido;
use App\Models\Faq;
use App\Models\Legislacao; // ✅ CORREÇÃO: Usando o Model Legislacao
use App\Models\MembroEquipe;
use App\Models\User;
use App\Models\DailyPageView;

class StatsController extends Controller
{
    /**
     * Retorna a view de estatísticas (dashboard BI) com todos os dados necessários.
     */
    public function index()
    {
        // Totals
        $totals = [
            'users' => User::count(),
            'noticias' => Noticia::count(),
            'eventos' => Evento::count(),
            'locais' => Local::count(),
            'links_rapidos' => LinkRapido::count(),
            'faqs' => Faq::count(),
            'legislacoes' => Legislacao::count(),
            'membros_equipe' => MembroEquipe::count(),
            'page_views_total' => DailyPageView::sum('view_count'),
        ];

        $viewsOverTimeQuery = DailyPageView::where('date', '>=', now()->subDays(29)->toDateString())
            ->selectRaw('date, SUM(view_count) as views')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get()
            ->mapWithKeys(function ($row) {
                return [$row->date => (int)$row->views];
            });

        $viewsOverTime = [];
        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $viewsOverTime[] = ['date' => $date, 'views' => $viewsOverTimeQuery[$date] ?? 0];
        }

        $topPages = DailyPageView::selectRaw('path, SUM(view_count) as view_count')
            ->groupBy('path')
            ->orderByDesc('view_count')
            ->take(10)
            ->get()
            ->toArray();

        $byDevice = DailyPageView::selectRaw('device, SUM(view_count) as views')
            ->groupBy('device')
            ->get()
            ->mapWithKeys(function($row){ return [$row->device ?? 'unknown' => (int)$row->views]; })
            ->toArray();

        $rows = DailyPageView::where('date', '>=', now()->subDay()->toDateString())
            ->whereNotNull('hour')
            ->selectRaw('hour, SUM(view_count) as views')
            ->groupBy('hour')
            ->orderBy('hour')
            ->get()
            ->keyBy('hour')
            ->map(fn($r) => (int)$r->views);

        $hourlyLabels = [];
        $hourlyValues = [];
        for ($h = 0; $h < 24; $h++) {
            $currentHour = now()->subHours(23 - $h);
            $hourlyLabels[] = $currentHour->format('H:00');
            $hourlyValues[] = $rows[$currentHour->hour] ?? 0;
        }
        $hourlyLast24 = ['labels' => $hourlyLabels, 'values' => $hourlyValues];

        $topPagesByDevice = DailyPageView::selectRaw('path, SUM(view_count) as views')
            ->groupBy('path')
            ->orderByDesc('views')
            ->take(10)
            ->get()
            ->map(fn($r) => ['path' => $r->path, 'view_count' => (int)$r->views])
            ->toArray();

        return view('admin.stats', compact(
            'totals',
            'viewsOverTime',
            'topPages',
            'byDevice',
            'hourlyLast24',
            'topPagesByDevice'
        ));
    }

    // --- MÉTODOS DE API ---

    public function topPagesByDevice(Request $request)
    {
        $limit = intval($request->query('limit', 10));
        $device = $request->query('device', null);

        $q = DailyPageView::selectRaw('path, SUM(view_count) as views')
            ->groupBy('path')
            ->orderByDesc('views');

        if ($device) {
            $q->where('device', $device);
        }

        $data = $q->take($limit)->get()->map(fn($r) => ['path' => $r->path, 'view_count' => (int)$r->views]);
        return response()->json($data);
    }

    public function pageViewsOverTime(Request $request)
    {
        $path = $request->query('path');
        if (!$path) return response()->json([], 400);

        $days = intval($request->query('days', 30));

        $query = DailyPageView::where('path', $path)
            ->where('date', '>=', now()->subDays($days - 1)->toDateString())
            ->selectRaw('date, SUM(view_count) as views')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get()
            ->mapWithKeys(fn($row) => [$row->date => (int)$row->views]);

        $result = [];
        for ($i = $days - 1; $i >= 0; $i--) {
            $date = now()->subDays($i)->toDateString();
            $result[] = ['date' => $date, 'views' => $query[$date] ?? 0];
        }

        return response()->json($result);
    }

    public function pageByDevice(Request $request)
    {
        $path = $request->query('path');
        if (!$path) return response()->json([], 400);

        $data = DailyPageView::where('path', $path)
            ->selectRaw('device, SUM(view_count) as views')
            ->groupBy('device')
            ->get()
            ->mapWithKeys(fn($row) => [$row->device ?? 'unknown' => (int)$row->views]);

        return response()->json($data);
    }
}