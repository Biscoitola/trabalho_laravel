<x-layouts::app :title="__('Editar status')">
    <div class="max-w-2xl space-y-6">
        <h1 class="text-2xl font-semibold">Editar status</h1>
        <form method="POST" action="{{ route('status.update', $status) }}" class="space-y-5">
            @method('PUT')
            @include('status._form')
        </form>
    </div>
</x-layouts::app>
