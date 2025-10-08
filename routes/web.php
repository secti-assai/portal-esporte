<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\NoticiaController;
use App\Http\Controllers\NoticiaPublicaController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\Admin\EventoController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Models\Noticia;
use App\Http\Controllers\Admin\MembroEquipeController;
use App\Http\Controllers\Admin\LocalController;
use App\Http\Controllers\Admin\LinkRapidoController;
use App\Http\Controllers\Admin\LegislacaoController;
use App\Http\Controllers\Admin\FaqController;


/*
|--------------------------------------------------------------------------
| 🌐 ROTAS PÚBLICAS - PORTAL
|--------------------------------------------------------------------------
*/
Route::middleware(['page.view'])->group(function () {
    Route::get('/', [PortalController::class, 'index'])->name('home');

    /**
     * Página pública de notícias
     */
    Route::get('/noticias', [NoticiaPublicaController::class, 'index'])->name('noticias.index');
    Route::get('/noticias/{id}', [NoticiaPublicaController::class, 'show'])->name('noticias.show');
});

/*
|--------------------------------------------------------------------------
| 🔐 LOGIN / LOGOUT ADMINISTRATIVO
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    // Tela de login
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

    // Envio do formulário de login
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    // Logout do painel
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| 🖼️ UPLOAD DO EDITOR TINYMCE
|--------------------------------------------------------------------------
*/
Route::post('/admin/upload/tinymce', function (Request $request) {

    if (!$request->hasFile('file')) {
        return response()->json(['error' => 'Nenhum arquivo recebido.'], 400);
    }

    try {
        $file = $request->file('file');
        $path = $file->store('noticias', 'public');

        return response()->json([
            'location' => asset('storage/' . $path),
        ]);

    } catch (\Throwable $e) {
        Log::error('🧩 Erro TinyMCE upload: ' . $e->getMessage());
        return response()->json(['error' => 'Erro interno: ' . $e->getMessage()], 500);
    }

})->middleware('web')->name('admin.upload.tinymce');

/*
|--------------------------------------------------------------------------
| 🧱 ROTAS ADMINISTRATIVAS PROTEGIDAS
|--------------------------------------------------------------------------
| Tudo que estiver dentro deste grupo requer autenticação de administrador.
*/
Route::middleware(['admin.auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Painel principal
        Route::get('/dashboard', [NoticiaController::class, 'index'])->name('dashboard');

        // CRUD de Notícias
        Route::resource('noticias', NoticiaController::class)->except(['show', 'index']);

        // CRUD de Eventos
        Route::resource('eventos', EventoController::class)->except(['show']);

        // CRUD de Categorias
        Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
        Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
        Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');

        // --- NOVAS ROTAS PARA CONTEÚDO DINÂMICO ---
        Route::resource('equipe', MembroEquipeController::class)->except(['show']);
        Route::resource('locais', LocalController::class)->parameters(['locais' => 'local'])->except(['show']);
        Route::resource('links-rapidos', LinkRapidoController::class)->except(['show']);
        Route::resource('legislacoes', LegislacaoController::class)->except(['show']);
        Route::resource('faqs', FaqController::class)->except(['show']);

        // API para buscar locais dinamicamente
        Route::get('/api/locais', [LocalController::class, 'getLocais'])->name('api.locais');

    // Página de Estatísticas/BI
    Route::get('/stats', [\App\Http\Controllers\Admin\StatsController::class, 'index'])->name('stats');

    // Endpoints de estatísticas/BI
    Route::get('/api/stats/totals', [\App\Http\Controllers\Admin\StatsController::class, 'totals'])->name('api.stats.totals');
    Route::get('/api/stats/top-pages', [\App\Http\Controllers\Admin\StatsController::class, 'topPages'])->name('api.stats.top_pages');
    Route::get('/api/stats/views-over-time', [\App\Http\Controllers\Admin\StatsController::class, 'viewsOverTime'])->name('api.stats.views_over_time');
    });
