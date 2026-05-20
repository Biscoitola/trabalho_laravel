<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StatusController extends Controller
{
    public function index(): View
    {
        return view('status.index', [
            'statuses' => Status::latest()->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('status.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Status::create($this->validatedData($request));

        return redirect()->route('status.index')->with('success', 'Status criado com sucesso.');
    }

    public function edit(Status $status): View
    {
        return view('status.edit', compact('status'));
    }

    public function update(Request $request, Status $status): RedirectResponse
    {
        $status->update($this->validatedData($request));

        return redirect()->route('status.index')->with('success', 'Status atualizado com sucesso.');
    }

    public function destroy(Status $status): RedirectResponse
    {
        if ($status->tarefas()->exists()) {
            return back()->with('error', 'Status vinculado a tarefas não pode ser excluído.');
        }

        $status->delete();

        return redirect()->route('status.index')->with('success', 'Status excluído com sucesso.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'nome' => ['required', 'string', 'max:255'],
        ]);
    }
}
