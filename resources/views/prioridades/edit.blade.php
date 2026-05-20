<x-layouts::app :title="__('Editar prioridade')">
    <div class="max-w-2xl space-y-6">
        <h1 class="text-2xl font-semibold">Editar prioridade</h1>
        <form method="POST" action="{{ route('prioridades.update', $prioridade) }}" class="space-y-5">
            @method('PUT')
            @include('prioridades._form')
        </form>
    </div>
</x-layouts::app>
