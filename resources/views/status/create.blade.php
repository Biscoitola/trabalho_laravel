<x-layouts::app :title="__('Novo status')">
    <div class="max-w-2xl space-y-6">
        <h1 class="text-2xl font-semibold">Novo status</h1>
        <form method="POST" action="{{ route('status.store') }}" class="space-y-5">
            @include('status._form')
        </form>
    </div>
</x-layouts::app>
