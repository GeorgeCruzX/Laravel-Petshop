<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Http\Requests\PetRequest;
use Illuminate\Support\Facades\Gate;
use App\Services\PetService;
use App\Services\ClienteService;
use App\Services\RacaService;

class PetController extends Controller
{
    public function __construct(
        protected PetService $service,
        protected ClienteService $clienteService,
        protected RacaService $racaService
    ) {}

    public function index()
    {
        Gate::authorize('viewAny', Pet::class);
        $data = $this->service->all(['cliente', 'raca.especie'], [], 'nome');
        return view('pet.index', compact('data'));
    }

    public function create()
    {
        Gate::authorize('create', Pet::class);
        $clientes = $this->clienteService->all([], [], 'nome');
        $racas = $this->racaService->all(['especie'], [], 'nome');
        return view('pet.create', compact('clientes', 'racas'));
    }

    public function store(PetRequest $request)
    {
        Gate::authorize('create', Pet::class);
        $this->service->store($request->validated());
        return redirect()->route('pet.index')->with('success', 'Pet cadastrado com sucesso!');
    }

    public function show(string $id)
    {
        $pet = $this->service->find($id, ['cliente', 'raca.especie', 'agendamento.servico']);
        Gate::authorize('view', $pet);
        if (isset($pet)) {
            return view('pet.show', compact('pet'));
        }
        return "<h1>Pet não encontrado!</h1>";
    }

    public function edit(string $id)
    {
        $pet = $this->service->find($id);
        Gate::authorize('update', $pet);
        if (isset($pet)) {
            $clientes = $this->clienteService->all([], [], 'nome');
            $racas = $this->racaService->all(['especie'], [], 'nome');
            return view('pet.edit', compact('pet', 'clientes', 'racas'));
        }
        return "<h1>Pet não encontrado!</h1>";
    }

    public function update(PetRequest $request, string $id)
    {
        $pet = $this->service->find($id);
        Gate::authorize('update', $pet);
        if (isset($pet)) {
            $this->service->update($request->validated(), $id);
            return redirect()->route('pet.index')->with('success', 'Pet atualizado com sucesso!');
        }
        return "<h1>Pet não encontrado!</h1>";
    }

    public function destroy(string $id)
    {
        $pet = $this->service->find($id);
        Gate::authorize('delete', $pet);
        if (isset($pet)) {
            $this->service->remove($id);
            return redirect()->route('pet.index')->with('success', 'Pet removido com sucesso!');
        }
        return "<h1>Pet não encontrado!</h1>";
    }

    public function audit(string $id)
    {
        $pet = $this->service->find($id);
        Gate::authorize('delete', $pet);
        if (isset($pet)) {
            $data = $this->service->audit($id);
            return view('pet.audit', compact('data'));
        }
        return "<h1>Não encontrado!</h1>";
    }
}
