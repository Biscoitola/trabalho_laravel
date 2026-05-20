<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $baseQuery = Tarefa::query()->where('user_id', auth()->id());

        return view('dashboard', [
            'totalTarefas' => (clone $baseQuery)->count(),
            'tarefasConcluidas' => (clone $baseQuery)
                ->whereHas('status', fn ($query) => $query->whereIn('nome', ['Concluido', 'Concluído']))
                ->count(),
            'tarefasPendentes' => (clone $baseQuery)
                ->whereHas('status', fn ($query) => $query->where('nome', 'Pendente'))
                ->count(),
        ]);
    }
}
