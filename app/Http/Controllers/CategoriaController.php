<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoriaController extends Controller
{
    public function index(): View
    {
        return view('categorias.index', [
            'categorias' => Categoria::latest()->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('categorias.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Categoria::create($this->validatedData($request));

        return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso.');
    }

    public function edit(Categoria $categoria): View
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria): RedirectResponse
    {
        $categoria->update($this->validatedData($request));

        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso.');
    }

    public function destroy(Categoria $categoria): RedirectResponse
    {
        if ($categoria->tarefas()->exists()) {
            return back()->with('error', 'Categoria vinculada a tarefas não pode ser excluída.');
        }

        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoria excluída com sucesso.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'descricao' => ['nullable', 'string', 'max:1000'],
        ]);
    }
}
