<x-layouts::app :title="__('Editar tarefa')">
    <div class="max-w-3xl space-y-6">
        <h1 class="text-2xl font-semibold">Editar tarefa</h1>
        <form method="POST" action="{{ route('tarefas.update', $tarefa) }}" class="space-y-5">
            @method('PUT')
            @include('tarefas._form')
        </form>
    </div>
</x-layouts::app>
