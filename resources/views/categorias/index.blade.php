<x-layouts::app :title="__('Categorias')">
    <div class="space-y-6">
        <div class="flex items-center justify-between gap-4">
            <h1 class="text-2xl font-semibold">Categorias</h1>
            <a href="{{ route('categorias.create') }}" class="rounded-md bg-zinc-900 px-4 py-2 text-sm font-medium text-white dark:bg-white dark:text-zinc-900">Nova categoria</a>
        </div>

        @if (session('error')) <div class="rounded-md border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">{{ session('error') }}</div> @endif

        <div class="overflow-hidden rounded-lg border border-zinc-200 dark:border-zinc-700">
            <table class="w-full text-left text-sm">
                <thead class="bg-zinc-100 text-zinc-600 dark:bg-zinc-900 dark:text-zinc-300">
                    <tr>
                        <th class="px-4 py-3">Nome</th>
                        <th class="px-4 py-3">Descrição</th>
                        <th class="px-4 py-3 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                    @forelse ($categorias as $categoria)
                        <tr>
                            <td class="px-4 py-3 font-medium">{{ $categoria->nome }}</td>
                            <td class="px-4 py-3 text-zinc-600 dark:text-zinc-400">{{ $categoria->descricao ?: '-' }}</td>
                            <td class="px-4 py-3">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('categorias.edit', $categoria) }}" class="rounded-md border border-zinc-300 px-3 py-1.5 dark:border-zinc-700">Editar</a>
                                    <form method="POST" action="{{ route('categorias.destroy', $categoria) }}">
                                        @csrf @method('DELETE')
                                        <button class="rounded-md border border-red-300 px-3 py-1.5 text-red-700" onclick="return confirm('Excluir esta categoria?')">Excluir</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="px-4 py-8 text-center text-zinc-500">Nenhuma categoria cadastrada.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $categorias->links() }}
    </div>
</x-layouts::app>
