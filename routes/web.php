<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PrioridadeController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TarefaController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::patch('tarefas/{tarefa}/concluir', [TarefaController::class, 'concluir'])->name('tarefas.concluir');
    Route::resource('tarefas', TarefaController::class)->except('show');
    Route::resource('categorias', CategoriaController::class)->except('show');
    Route::resource('prioridades', PrioridadeController::class)->except('show');
    Route::resource('status', StatusController::class)->except('show');
});

require __DIR__.'/settings.php';
