<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use App\Http\Requests\ServicoRequest;
use Illuminate\Support\Facades\Gate;
use App\Services\ServicoService;

class ServicoController extends Controller
{
    public function __construct(protected ServicoService $service) {}

    public function index()
    {
        Gate::authorize('viewAny', Servico::class);
        $data = $this->service->all([], [], 'nome');
        return view('servico.index', compact('data'));
    }

    public function create()
    {
        Gate::authorize('create', Servico::class);
        return view('servico.create');
    }

    public function store(ServicoRequest $request)
    {
        Gate::authorize('create', Servico::class);
        $this->service->store($request->validated());
        return redirect()->route('servico.index')->with('success', 'Serviço cadastrado com sucesso!');
    }

    public function show(string $id)
    {
        $servico = $this->service->find($id);
        Gate::authorize('view', $servico);
        if (isset($servico)) {
            return view('servico.show', compact('servico'));
        }
        return "<h1>Serviço não encontrado!</h1>";
    }

    public function edit(string $id)
    {
        $servico = $this->service->find($id);
        Gate::authorize('update', $servico);
        if (isset($servico)) {
            return view('servico.edit', compact('servico'));
        }
        return "<h1>Serviço não encontrado!</h1>";
    }

    public function update(ServicoRequest $request, string $id)
    {
        $servico = $this->service->find($id);
        Gate::authorize('update', $servico);
        if (isset($servico)) {
            $this->service->update($request->validated(), $id);
            return redirect()->route('servico.index')->with('success', 'Serviço atualizado com sucesso!');
        }
        return "<h1>Serviço não encontrado!</h1>";
    }

    public function destroy(string $id)
    {
        $servico = $this->service->find($id);
        Gate::authorize('delete', $servico);
        if (isset($servico)) {
            $this->service->remove($id);
            return redirect()->route('servico.index')->with('success', 'Serviço removido com sucesso!');
        }
        return "<h1>Serviço não encontrado!</h1>";
    }

    public function audit(string $id)
    {
        $servico = $this->service->find($id);
        Gate::authorize('delete', $servico);
        if (isset($servico)) {
            $data = $this->service->audit($id);
            return view('servico.audit', compact('data'));
        }
        return "<h1>Não encontrado!</h1>";
    }
}
