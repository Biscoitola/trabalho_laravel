<x-layouts::app :title="__('Tarefas')">
    <div class="space-y-6">
        <div class="flex items-center justify-between gap-4">
            <h1 class="text-2xl font-semibold">Tarefas</h1>
            <a href="{{ route('tarefas.create') }}" class="rounded-md bg-zinc-900 px-4 py-2 text-sm font-medium text-white dark:bg-white dark:text-zinc-900">Nova tarefa</a>
        </div>

        @if (session('success')) <div class="rounded-md border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">{{ session('success') }}</div> @endif
        @if (session('error')) <div class="rounded-md border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">{{ session('error') }}</div> @endif

        <form method="GET" action="{{ route('tarefas.index') }}" class="grid gap-3 rounded-lg border border-zinc-200 bg-white p-4 dark:border-zinc-700 dark:bg-zinc-900 md:grid-cols-[1fr_220px_auto]">
            <input name="busca" value="{{ request('busca') }}" placeholder="Buscar por título" class="rounded-md border border-zinc-300 bg-white px-3 py-2 text-sm dark:border-zinc-700 dark:bg-zinc-950">
            <select name="status" class="rounded-md border border-zinc-300 bg-white px-3 py-2 text-sm dark:border-zinc-700 dark:bg-zinc-950">
                <option value="">Todos os status</option>
                @foreach ($statuses as $status)
                    <option value="{{ $status->id }}" @selected((string) request('status') === (string) $status->id)>{{ $status->nome }}</option>
                @endforeach
            </select>
            <div class="flex gap-2">
                <button class="rounded-md bg-zinc-900 px-4 py-2 text-sm font-medium text-white dark:bg-white dark:text-zinc-900">Filtrar</button>
                <a href="{{ route('tarefas.index') }}" class="rounded-md border border-zinc-300 px-4 py-2 text-sm font-medium dark:border-zinc-700">Limpar</a>
            </div>
        </form>

        <div class="overflow-x-auto rounded-lg border border-zinc-200 dark:border-zinc-700">
            <table class="w-full min-w-[980px] text-left text-sm">
                <thead class="bg-zinc-100 text-zinc-600 dark:bg-zinc-900 dark:text-zinc-300">
                    <tr>
                        <th class="px-4 py-3">Título</th>
                        <th class="px-4 py-3">Categoria</th>
                        <th class="px-4 py-3">Prioridade</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Data limite</th>
                        <th class="px-4 py-3 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                    @forelse ($tarefas as $tarefa)
                        <tr>
                            <td class="px-4 py-3">
                                <p class="font-medium">{{ $tarefa->titulo }}</p>
                                @if ($tarefa->descricao)
                                    <p class="mt-1 line-clamp-2 text-xs text-zinc-500">{{ $tarefa->descricao }}</p>
                                @endif
                            </td>
                            <td class="px-4 py-3">{{ $tarefa->categoria->nome }}</td>
                            <td class="px-4 py-3">{{ $tarefa->prioridade->nome }}</td>
                            <td class="px-4 py-3">
                                <span class="rounded-full bg-zinc-100 px-2.5 py-1 text-xs font-medium dark:bg-zinc-800">{{ $tarefa->status->nome }}</span>
                            </td>
                            <td class="px-4 py-3">{{ $tarefa->data_limite?->format('d/m/Y') ?? '-' }}</td>
                            <td class="px-4 py-3">
                                <div class="flex justify-end gap-2">
                                    @if (! in_array($tarefa->status->nome, ['Concluido', 'Concluído'], true))
                                        <form method="POST" action="{{ route('tarefas.concluir', $tarefa) }}">
                                            @csrf @method('PATCH')
                                            <button class="rounded-md border border-emerald-300 px-3 py-1.5 text-emerald-700">Concluir</button>
                                        </form>
                                    @endif
                                    <a href="{{ route('tarefas.edit', $tarefa) }}" class="rounded-md border border-zinc-300 px-3 py-1.5 dark:border-zinc-700">Editar</a>
                                    <form method="POST" action="{{ route('tarefas.destroy', $tarefa) }}">
                                        @csrf @method('DELETE')
                                        <button class="rounded-md border border-red-300 px-3 py-1.5 text-red-700" onclick="return confirm('Excluir esta tarefa?')">Excluir</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="px-4 py-8 text-center text-zinc-500">Nenhuma tarefa encontrada.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $tarefas->links() }}
    </div>
</x-layouts::app>
