@csrf

<div class="grid gap-5 md:grid-cols-2">
    <div class="space-y-2 md:col-span-2">
        <label for="titulo" class="text-sm font-medium">Título</label>
        <input id="titulo" name="titulo" value="{{ old('titulo', $tarefa->titulo ?? '') }}" class="w-full rounded-md border border-zinc-300 bg-white px-3 py-2 dark:border-zinc-700 dark:bg-zinc-900" required>
        @error('titulo') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <div class="space-y-2 md:col-span-2">
        <label for="descricao" class="text-sm font-medium">Descrição</label>
        <textarea id="descricao" name="descricao" rows="4" class="w-full rounded-md border border-zinc-300 bg-white px-3 py-2 dark:border-zinc-700 dark:bg-zinc-900">{{ old('descricao', $tarefa->descricao ?? '') }}</textarea>
        @error('descricao') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <div class="space-y-2">
        <label for="data_limite" class="text-sm font-medium">Data limite</label>
        <input id="data_limite" type="date" name="data_limite" value="{{ old('data_limite', isset($tarefa) && $tarefa->data_limite ? $tarefa->data_limite->format('Y-m-d') : '') }}" class="w-full rounded-md border border-zinc-300 bg-white px-3 py-2 dark:border-zinc-700 dark:bg-zinc-900">
        @error('data_limite') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <div class="space-y-2">
        <label for="id_categoria" class="text-sm font-medium">Categoria</label>
        <select id="id_categoria" name="id_categoria" class="w-full rounded-md border border-zinc-300 bg-white px-3 py-2 dark:border-zinc-700 dark:bg-zinc-900" required>
            <option value="">Selecione</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" @selected(old('id_categoria', $tarefa->id_categoria ?? '') == $categoria->id)>{{ $categoria->nome }}</option>
            @endforeach
        </select>
        @error('id_categoria') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <div class="space-y-2">
        <label for="id_prioridade" class="text-sm font-medium">Prioridade</label>
        <select id="id_prioridade" name="id_prioridade" class="w-full rounded-md border border-zinc-300 bg-white px-3 py-2 dark:border-zinc-700 dark:bg-zinc-900" required>
            <option value="">Selecione</option>
            @foreach ($prioridades as $prioridade)
                <option value="{{ $prioridade->id }}" @selected(old('id_prioridade', $tarefa->id_prioridade ?? '') == $prioridade->id)>{{ $prioridade->nome }}</option>
            @endforeach
        </select>
        @error('id_prioridade') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
    </div>

    <div class="space-y-2">
        <label for="id_status" class="text-sm font-medium">Status</label>
        <select id="id_status" name="id_status" class="w-full rounded-md border border-zinc-300 bg-white px-3 py-2 dark:border-zinc-700 dark:bg-zinc-900" required>
            <option value="">Selecione</option>
            @foreach ($statuses as $status)
                <option value="{{ $status->id }}" @selected(old('id_status', $tarefa->id_status ?? '') == $status->id)>{{ $status->nome }}</option>
            @endforeach
        </select>
        @error('id_status') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
    </div>
</div>

<div class="flex gap-3">
    <button class="rounded-md bg-zinc-900 px-4 py-2 text-sm font-medium text-white dark:bg-white dark:text-zinc-900" type="submit">Salvar</button>
    <a href="{{ route('tarefas.index') }}" class="rounded-md border border-zinc-300 px-4 py-2 text-sm font-medium dark:border-zinc-700">Cancelar</a>
</div>
