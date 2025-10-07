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

/*
|--------------------------------------------------------------------------
| 🌐 ROTAS PÚBLICAS - PORTAL
|--------------------------------------------------------------------------
*/
Route::get('/', [PortalController::class, 'index'])->name('home');

/**
 * Página pública de notícias
 */
Route::get('/noticias', [NoticiaPublicaController::class, 'index'])->name('noticias.index');
Route::get('/noticias/{id}', [NoticiaPublicaController::class, 'show'])->name('noticias.show');

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
| Esta rota é usada internamente pelo TinyMCE para upload de imagens.
| Ela responde com JSON contendo o caminho público da imagem salva.
| O middleware 'web' é necessário para CSRF e sessão.
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
        Route::get('/noticias/create', [NoticiaController::class, 'create'])->name('noticias.create');
        Route::post('/noticias', [NoticiaController::class, 'store'])->name('noticias.store');
        Route::get('/noticias/{id}/edit', [NoticiaController::class, 'edit'])->name('noticias.edit');
        Route::put('/noticias/{id}', [NoticiaController::class, 'update'])->name('noticias.update');
        Route::delete('/noticias/{id}', [NoticiaController::class, 'destroy'])->name('noticias.destroy');

      
        // CRUD de Eventos
        Route::resource('eventos', EventoController::class)->except(['show']);


        // CRUD de Categorias
        Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
        Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
        Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
    });
