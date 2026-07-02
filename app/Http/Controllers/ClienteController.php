<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\ClienteRequest;
use Illuminate\Support\Facades\Gate;
use App\Services\ClienteService;

class ClienteController extends Controller
{
    public function __construct(protected ClienteService $service) {}

    public function index()
    {
        Gate::authorize('viewAny', Cliente::class);
        $data = $this->service->all(['pet'], [], 'nome');
        return view('cliente.index', compact('data'));
    }

    public function create()
    {
        Gate::authorize('create', Cliente::class);
        return view('cliente.create');
    }

    public function store(ClienteRequest $request)
    {
        Gate::authorize('create', Cliente::class);
        $this->service->store($request->validated());
        return redirect()->route('cliente.index')->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function show(string $id)
    {
        $cliente = $this->service->find($id, ['pet.raca.especie']);
        Gate::authorize('view', $cliente);
        if (isset($cliente)) {
            return view('cliente.show', compact('cliente'));
        }
        return "<h1>Cliente não encontrado!</h1>";
    }

    public function edit(string $id)
    {
        $cliente = $this->service->find($id);
        Gate::authorize('update', $cliente);
        if (isset($cliente)) {
            return view('cliente.edit', compact('cliente'));
        }
        return "<h1>Cliente não encontrado!</h1>";
    }

    public function update(ClienteRequest $request, string $id)
    {
        $cliente = $this->service->find($id);
        Gate::authorize('update', $cliente);
        if (isset($cliente)) {
            $this->service->update($request->validated(), $id);
            return redirect()->route('cliente.index')->with('success', 'Cliente atualizado com sucesso!');
        }
        return "<h1>Cliente não encontrado!</h1>";
    }

    public function destroy(string $id)
    {
        $cliente = $this->service->find($id);
        Gate::authorize('delete', $cliente);
        if (isset($cliente)) {
            $this->service->remove($id);
            return redirect()->route('cliente.index')->with('success', 'Cliente removido com sucesso!');
        }
        return "<h1>Cliente não encontrado!</h1>";
    }

    public function audit(string $id)
    {
        $cliente = $this->service->find($id);
        Gate::authorize('delete', $cliente);
        if (isset($cliente)) {
            $data = $this->service->audit($id);
            return view('cliente.audit', compact('data'));
        }
        return "<h1>Não encontrado!</h1>";
    }
}
