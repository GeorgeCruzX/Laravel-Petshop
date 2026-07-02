<?php

namespace App\Http\Controllers;

use App\Models\Especie;
use App\Http\Requests\EspecieRequest;
use Illuminate\Support\Facades\Gate;
use App\Services\EspecieService;

class EspecieController extends Controller
{
    public function __construct(protected EspecieService $service) {}

    public function index()
    {
        Gate::authorize('viewAny', Especie::class);
        $data = $this->service->all(['raca'], [], 'nome');
        return view('especie.index', compact('data'));
    }

    public function create()
    {
        Gate::authorize('create', Especie::class);
        return view('especie.create');
    }

    public function store(EspecieRequest $request)
    {
        Gate::authorize('create', Especie::class);
        $this->service->store($request->validated());
        return redirect()->route('especie.index')->with('success', 'Espécie cadastrada com sucesso!');
    }

    public function show(string $id)
    {
        $especie = $this->service->find($id, ['raca']);
        Gate::authorize('view', $especie);
        if (isset($especie)) {
            return view('especie.show', compact('especie'));
        }
        return "<h1>Espécie não encontrada!</h1>";
    }

    public function edit(string $id)
    {
        $especie = $this->service->find($id);
        Gate::authorize('update', $especie);
        if (isset($especie)) {
            return view('especie.edit', compact('especie'));
        }
        return "<h1>Espécie não encontrada!</h1>";
    }

    public function update(EspecieRequest $request, string $id)
    {
        $especie = $this->service->find($id);
        Gate::authorize('update', $especie);
        if (isset($especie)) {
            $this->service->update($request->validated(), $id);
            return redirect()->route('especie.index')->with('success', 'Espécie atualizada com sucesso!');
        }
        return "<h1>Espécie não encontrada!</h1>";
    }

    public function destroy(string $id)
    {
        $especie = $this->service->find($id);
        Gate::authorize('delete', $especie);
        if (isset($especie)) {
            $this->service->remove($id);
            return redirect()->route('especie.index')->with('success', 'Espécie removida com sucesso!');
        }
        return "<h1>Espécie não encontrada!</h1>";
    }

    public function audit(string $id)
    {
        $especie = $this->service->find($id);
        Gate::authorize('delete', $especie);
        if (isset($especie)) {
            $data = $this->service->audit($id);
            return view('especie.audit', compact('data'));
        }
        return "<h1>Não encontrado!</h1>";
    }
}
