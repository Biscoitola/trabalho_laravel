<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Prioridade;
use App\Models\Status;
use App\Models\Tarefa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class TarefaController extends Controller
{
    public function index(Request $request): View
    {
        $tarefas = Tarefa::with(['categoria', 'prioridade', 'status'])
            ->where('user_id', auth()->id())
            ->when($request->filled('busca'), function ($query) use ($request) {
                $query->where('titulo', 'like', '%'.$request->string('busca')->toString().'%');
            })
            ->when($request->filled('status'), function ($query) use ($request) {
                $query->where('id_status', $request->integer('status'));
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('tarefas.index', [
            'tarefas' => $tarefas,
            'statuses' => Status::orderBy('nome')->get(),
        ]);
    }

    public function create(): View
    {
        return view('tarefas.create', $this->formData());
    }

    public function store(Request $request): RedirectResponse
    {
        Tarefa::create($this->validatedData($request) + ['user_id' => auth()->id()]);

        return redirect()->route('tarefas.index')->with('success', 'Tarefa criada com sucesso.');
    }

    public function edit(Tarefa $tarefa): View
    {
        $this->authorizeOwner($tarefa);

        return view('tarefas.edit', $this->formData() + compact('tarefa'));
    }

    public function update(Request $request, Tarefa $tarefa): RedirectResponse
    {
        $this->authorizeOwner($tarefa);

        $tarefa->update($this->validatedData($request));

        return redirect()->route('tarefas.index')->with('success', 'Tarefa atualizada com sucesso.');
    }

    public function destroy(Tarefa $tarefa): RedirectResponse
    {
        $this->authorizeOwner($tarefa);
        $tarefa->delete();

        return redirect()->route('tarefas.index')->with('success', 'Tarefa excluída com sucesso.');
    }

    public function concluir(Tarefa $tarefa): RedirectResponse
    {
        $this->authorizeOwner($tarefa);

        $statusConcluido = Status::whereIn('nome', ['Concluido', 'Concluído'])->first();

        if (! $statusConcluido) {
            return back()->with('error', 'Cadastre o status "Concluido" antes de concluir tarefas.');
        }

        $tarefa->update(['id_status' => $statusConcluido->id]);

        return back()->with('success', 'Tarefa marcada como concluída.');
    }

    private function formData(): array
    {
        return [
            'categorias' => Categoria::orderBy('nome')->get(),
            'prioridades' => Prioridade::orderBy('nome')->get(),
            'statuses' => Status::orderBy('nome')->get(),
        ];
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'descricao' => ['nullable', 'string', 'max:2000'],
            'data_limite' => ['nullable', 'date'],
            'id_categoria' => ['required', Rule::exists('categorias', 'id')],
            'id_prioridade' => ['required', Rule::exists('prioridades', 'id')],
            'id_status' => ['required', Rule::exists('statuses', 'id')],
        ]);
    }

    private function authorizeOwner(Tarefa $tarefa): void
    {
        abort_unless($tarefa->user_id === auth()->id(), 403);
    }
}
