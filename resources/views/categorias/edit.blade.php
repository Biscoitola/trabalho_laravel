<x-layouts::app :title="__('Editar categoria')">
    <div class="max-w-2xl space-y-6">
        <h1 class="text-2xl font-semibold">Editar categoria</h1>
        <form method="POST" action="{{ route('categorias.update', $categoria) }}" class="space-y-5">
            @method('PUT')
            @include('categorias._form')
        </form>
    </div>
</x-layouts::app>
