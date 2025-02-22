<?php

use App\Http\Controllers\VagaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('vagas.index');
    }
    return redirect()->route('login');
});

// Rotas de vagas (apenas para usuários autenticados)
Route::middleware('auth')->group(function () {
    Route::get('/vagas', [VagaController::class, 'index'])->name('vagas.index');
    Route::post('/vagas', [VagaController::class, 'store']);
});

// Rota do Dashboard (opcional, se quiser manter)
Route::get('/dashboard', function () {
    return redirect()->route('vagas.index'); // Redireciona para vagas ao invés de dashboard
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas de perfil (apenas usuários autenticados podem acessar)
    Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Carregar as rotas de autenticação
require __DIR__.'/auth.php';