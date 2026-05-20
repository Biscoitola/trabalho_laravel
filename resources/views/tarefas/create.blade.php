<x-layouts::app :title="__('Nova tarefa')">
    <div class="max-w-3xl space-y-6">
        <h1 class="text-2xl font-semibold">Nova tarefa</h1>
        <form method="POST" action="{{ route('tarefas.store') }}" class="space-y-5">
            @include('tarefas._form')
        </form>
    </div>
</x-layouts::app>
