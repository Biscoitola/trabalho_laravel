<x-layouts::app :title="__('Nova categoria')">
    <div class="max-w-2xl space-y-6">
        <h1 class="text-2xl font-semibold">Nova categoria</h1>
        <form method="POST" action="{{ route('categorias.store') }}" class="space-y-5">
            @include('categorias._form')
        </form>
    </div>
</x-layouts::app>
