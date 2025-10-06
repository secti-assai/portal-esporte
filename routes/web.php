<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\NoticiaController;
use App\Http\Controllers\PortalController;

Route::get('/', [PortalController::class, 'index'])->name('home');
Route::get('/noticia/{id}', [PortalController::class, 'show'])->name('noticias.show');

// LOGIN
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.post');
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// ROTAS PROTEGIDAS
Route::middleware(['admin.auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [NoticiaController::class, 'index'])->name('dashboard');
    Route::get('/noticias/create', [NoticiaController::class, 'create'])->name('noticias.create');
    Route::post('/noticias', [NoticiaController::class, 'store'])->name('noticias.store');
    Route::get('/noticias/{id}/edit', [NoticiaController::class, 'edit'])->name('noticias.edit');
    Route::put('/noticias/{id}', [NoticiaController::class, 'update'])->name('noticias.update');
    Route::delete('/noticias/{id}', [NoticiaController::class, 'destroy'])->name('noticias.destroy');
});



