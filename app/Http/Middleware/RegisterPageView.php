<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\PageView;

class RegisterPageView
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        try {
            $path = $request->path();

            // Apenas para rotas públicas (evita admin e arquivos)
            if (str_starts_with($path, 'admin') || str_starts_with($path, 'api') ) {
                return $response;
            }

            // Increment global aggregated counter
            $pv = PageView::firstOrCreate(['path' => $path]);
            $pv->increment('view_count');
            $pv->last_viewed_at = now();
            $pv->save();

            // Also increment daily/hourly aggregated table for richer BI
            $ua = strtolower($request->userAgent() ?? '');
            $device = 'unknown';
            if (str_contains($ua, 'mobile') || str_contains($ua, 'android') || str_contains($ua, 'iphone')) {
                $device = 'mobile';
            } elseif (str_contains($ua, 'bot') || str_contains($ua, 'spider') || str_contains($ua, 'crawl')) {
                $device = 'bot';
            } else {
                $device = 'desktop';
            }

            $date = now()->toDateString();
            $hour = now()->hour;

            \App\Models\DailyPageView::updateOrCreate(
                ['date' => $date, 'hour' => $hour, 'path' => $path, 'device' => $device],
                ['view_count' => \DB::raw('COALESCE(view_count,0) + 1')]
            );

        } catch (\Throwable $e) {
            // não atrapalhar a resposta em caso de erro
        }

        return $response;
    }
}
