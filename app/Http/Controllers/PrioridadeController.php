<?php

namespace App\Http\Controllers;

use App\Models\Prioridade;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PrioridadeController extends Controller
{
    public function index(): View
    {
        return view('prioridades.index', [
            'prioridades' => Prioridade::latest()->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('prioridades.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Prioridade::create($this->validatedData($request));

        return redirect()->route('prioridades.index')->with('success', 'Prioridade criada com sucesso.');
    }

    public function edit(Prioridade $prioridade): View
    {
        return view('prioridades.edit', compact('prioridade'));
    }

    public function update(Request $request, Prioridade $prioridade): RedirectResponse
    {
        $prioridade->update($this->validatedData($request));

        return redirect()->route('prioridades.index')->with('success', 'Prioridade atualizada com sucesso.');
    }

    public function destroy(Prioridade $prioridade): RedirectResponse
    {
        if ($prioridade->tarefas()->exists()) {
            return back()->with('error', 'Prioridade vinculada a tarefas não pode ser excluída.');
        }

        $prioridade->delete();

        return redirect()->route('prioridades.index')->with('success', 'Prioridade excluída com sucesso.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'nome' => ['required', 'string', 'max:255'],
        ]);
    }
}
