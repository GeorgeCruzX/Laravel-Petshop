<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Http\Requests\AgendamentoRequest;
use Illuminate\Support\Facades\Gate;
use App\Services\AgendamentoService;
use App\Services\PetService;
use App\Services\ServicoService;

class AgendamentoController extends Controller
{
    public function __construct(
        protected AgendamentoService $service,
        protected PetService $petService,
        protected ServicoService $servicoService
    ) {}

    public function index()
    {
        Gate::authorize('viewAny', Agendamento::class);
        $data = $this->service->all(['pet.cliente', 'servico'], [], 'data_hora');
        return view('agendamento.index', compact('data'));
    }

    public function create()
    {
        Gate::authorize('create', Agendamento::class);
        $pets = $this->petService->all(['cliente'], [], 'nome');
        $servicos = $this->servicoService->all([], [], 'nome');
        return view('agendamento.create', compact('pets', 'servicos'));
    }

    public function store(AgendamentoRequest $request)
    {
        Gate::authorize('create', Agendamento::class);
        $this->service->store($request->validated());
        return redirect()->route('agendamento.index')->with('success', 'Agendamento criado com sucesso!');
    }

    public function show(string $id)
    {
        $agendamento = $this->service->find($id, ['pet.cliente', 'pet.raca.especie', 'servico']);
        Gate::authorize('view', $agendamento);
        if (isset($agendamento)) {
            return view('agendamento.show', compact('agendamento'));
        }
        return "<h1>Agendamento não encontrado!</h1>";
    }

    public function edit(string $id)
    {
        $agendamento = $this->service->find($id);
        Gate::authorize('update', $agendamento);
        if (isset($agendamento)) {
            $pets = $this->petService->all(['cliente'], [], 'nome');
            $servicos = $this->servicoService->all([], [], 'nome');
            return view('agendamento.edit', compact('agendamento', 'pets', 'servicos'));
        }
        return "<h1>Agendamento não encontrado!</h1>";
    }

    public function update(AgendamentoRequest $request, string $id)
    {
        $agendamento = $this->service->find($id);
        Gate::authorize('update', $agendamento);
        if (isset($agendamento)) {
            $this->service->update($request->validated(), $id);
            return redirect()->route('agendamento.index')->with('success', 'Agendamento atualizado com sucesso!');
        }
        return "<h1>Agendamento não encontrado!</h1>";
    }

    public function destroy(string $id)
    {
        $agendamento = $this->service->find($id);
        Gate::authorize('delete', $agendamento);
        if (isset($agendamento)) {
            $this->service->remove($id);
            return redirect()->route('agendamento.index')->with('success', 'Agendamento removido com sucesso!');
        }
        return "<h1>Agendamento não encontrado!</h1>";
    }

    public function audit(string $id)
    {
        $agendamento = $this->service->find($id);
        Gate::authorize('delete', $agendamento);
        if (isset($agendamento)) {
            $data = $this->service->audit($id);
            return view('agendamento.audit', compact('data'));
        }
        return "<h1>Não encontrado!</h1>";
    }
}
