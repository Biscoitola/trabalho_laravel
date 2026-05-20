<x-layouts::app :title="__('Dashboard')">
    <div class="space-y-6">
        <div>
            <h1 class="text-2xl font-semibold text-zinc-900 dark:text-white">Bem-vindo, {{ auth()->user()->name }}</h1>
            <p class="mt-1 text-sm text-zinc-600 dark:text-zinc-400">Resumo das suas tarefas cadastradas.</p>
        </div>

        <div class="grid gap-4 md:grid-cols-3">
            <div class="rounded-lg border border-zinc-200 bg-white p-5 dark:border-zinc-700 dark:bg-zinc-900">
                <p class="text-sm text-zinc-500">Total de tarefas</p>
                <p class="mt-2 text-3xl font-semibold">{{ $totalTarefas }}</p>
            </div>
            <div class="rounded-lg border border-zinc-200 bg-white p-5 dark:border-zinc-700 dark:bg-zinc-900">
                <p class="text-sm text-zinc-500">Concluídas</p>
                <p class="mt-2 text-3xl font-semibold text-emerald-600">{{ $tarefasConcluidas }}</p>
            </div>
            <div class="rounded-lg border border-zinc-200 bg-white p-5 dark:border-zinc-700 dark:bg-zinc-900">
                <p class="text-sm text-zinc-500">Pendentes</p>
                <p class="mt-2 text-3xl font-semibold text-amber-600">{{ $tarefasPendentes }}</p>
            </div>
        </div>

        <div class="flex gap-3">
            <a href="{{ route('tarefas.create') }}" class="rounded-md bg-zinc-900 px-4 py-2 text-sm font-medium text-white dark:bg-white dark:text-zinc-900">Nova tarefa</a>
            <a href="{{ route('tarefas.index') }}" class="rounded-md border border-zinc-300 px-4 py-2 text-sm font-medium dark:border-zinc-700">Ver tarefas</a>
        </div>
    </div>
</x-layouts::app>
