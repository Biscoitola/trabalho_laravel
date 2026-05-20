@csrf

<div class="space-y-2">
    <label for="nome" class="text-sm font-medium">Nome</label>
    <input id="nome" name="nome" value="{{ old('nome', $prioridade->nome ?? '') }}" class="w-full rounded-md border border-zinc-300 bg-white px-3 py-2 dark:border-zinc-700 dark:bg-zinc-900" required>
    @error('nome') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
</div>

<div class="flex gap-3">
    <button class="rounded-md bg-zinc-900 px-4 py-2 text-sm font-medium text-white dark:bg-white dark:text-zinc-900" type="submit">Salvar</button>
    <a href="{{ route('prioridades.index') }}" class="rounded-md border border-zinc-300 px-4 py-2 text-sm font-medium dark:border-zinc-700">Cancelar</a>
</div>
