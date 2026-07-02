<?php

namespace App\Http\Controllers;

use App\Models\Raca;
use App\Http\Requests\RacaRequest;
use Illuminate\Support\Facades\Gate;
use App\Services\RacaService;
use App\Services\EspecieService;

class RacaController extends Controller
{
    public function __construct(protected RacaService $service, protected EspecieService $especieService) {}

    public function index()
    {
        Gate::authorize('viewAny', Raca::class);
        $data = $this->service->all(['especie'], [], 'nome');
        return view('raca.index', compact('data'));
    }

    public function create()
    {
        Gate::authorize('create', Raca::class);
        $especies = $this->especieService->all([], [], 'nome');
        return view('raca.create', compact('especies'));
    }

    public function store(RacaRequest $request)
    {
        Gate::authorize('create', Raca::class);
        $this->service->store($request->validated());
        return redirect()->route('raca.index')->with('success', 'Raça cadastrada com sucesso!');
    }

    public function show(string $id)
    {
        $raca = $this->service->find($id, ['especie', 'pet']);
        Gate::authorize('view', $raca);
        if (isset($raca)) {
            return view('raca.show', compact('raca'));
        }
        return "<h1>Raça não encontrada!</h1>";
    }

    public function edit(string $id)
    {
        $raca = $this->service->find($id);
        Gate::authorize('update', $raca);
        if (isset($raca)) {
            $especies = $this->especieService->all([], [], 'nome');
            return view('raca.edit', compact('raca', 'especies'));
        }
        return "<h1>Raça não encontrada!</h1>";
    }

    public function update(RacaRequest $request, string $id)
    {
        $raca = $this->service->find($id);
        Gate::authorize('update', $raca);
        if (isset($raca)) {
            $this->service->update($request->validated(), $id);
            return redirect()->route('raca.index')->with('success', 'Raça atualizada com sucesso!');
        }
        return "<h1>Raça não encontrada!</h1>";
    }

    public function destroy(string $id)
    {
        $raca = $this->service->find($id);
        Gate::authorize('delete', $raca);
        if (isset($raca)) {
            $this->service->remove($id);
            return redirect()->route('raca.index')->with('success', 'Raça removida com sucesso!');
        }
        return "<h1>Raça não encontrada!</h1>";
    }

    public function audit(string $id)
    {
        $raca = $this->service->find($id);
        Gate::authorize('delete', $raca);
        if (isset($raca)) {
            $data = $this->service->audit($id);
            return view('raca.audit', compact('data'));
        }
        return "<h1>Não encontrado!</h1>";
    }
}
