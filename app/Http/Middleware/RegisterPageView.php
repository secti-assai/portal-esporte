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

            $pv = PageView::firstOrCreate(['path' => $path]);
            $pv->increment('view_count');
            $pv->last_viewed_at = now();
            $pv->save();
        } catch (\Throwable $e) {
            // não atrapalhar a resposta em caso de erro
        }

        return $response;
    }
}
