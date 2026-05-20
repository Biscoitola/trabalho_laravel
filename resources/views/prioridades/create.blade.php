<x-layouts::app :title="__('Nova prioridade')">
    <div class="max-w-2xl space-y-6">
        <h1 class="text-2xl font-semibold">Nova prioridade</h1>
        <form method="POST" action="{{ route('prioridades.store') }}" class="space-y-5">
            @include('prioridades._form')
        </form>
    </div>
</x-layouts::app>
