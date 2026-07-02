@extends('template/main', ['titulo'=>'PetShop','cabecalho'=>'Detalhes do Pet','rota'=>''])
@section('conteudo')
<div class="row">
    <div class="col-md-4"><div class="form-floating mb-3"><input type="text" class="form-control" value="{{ $pet->nome }}" disabled><label>Nome</label></div></div>
    <div class="col-md-3"><div class="form-floating mb-3"><input type="text" class="form-control" value="{{ $pet->data_nascimento ?? '—' }}" disabled><label>Nascimento</label></div></div>
    <div class="col-md-2"><div class="form-floating mb-3"><input type="text" class="form-control" value="{{ $pet->sexo == 'M' ? 'Macho' : 'Fêmea' }}" disabled><label>Sexo</label></div></div>
</div>
<div class="row">
    <div class="col-md-5"><div class="form-floating mb-3"><input type="text" class="form-control" value="{{ $pet->cliente->nome ?? '—' }}" disabled><label>Dono</label></div></div>
    <div class="col-md-3"><div class="form-floating mb-3"><input type="text" class="form-control" value="{{ $pet->raca->nome ?? '—' }}" disabled><label>Raça</label></div></div>
    <div class="col-md-3"><div class="form-floating mb-3"><input type="text" class="form-control" value="{{ $pet->raca->especie->nome ?? '—' }}" disabled><label>Espécie</label></div></div>
</div>
<h5 class="mt-3">Histórico de Agendamentos</h5>
<table class="table table-sm table-bordered mb-4">
    <thead><th>Serviço</th><th>Data/Hora</th><th>Status</th></thead>
    <tbody>
        @forelse($pet->agendamento as $a)
        <tr>
            <td>{{ $a->servico->nome ?? '—' }}</td>
            <td>{{ \Carbon\Carbon::parse($a->data_hora)->format('d/m/Y H:i') }}</td>
            <td><span class="badge bg-{{ ['pendente'=>'secondary','confirmado'=>'primary','concluido'=>'success','cancelado'=>'danger'][$a->status] ?? 'secondary' }}">{{ ucfirst($a->status) }}</span></td>
        </tr>
        @empty
        <tr><td colspan="3" class="text-muted">Nenhum agendamento.</td></tr>
        @endforelse
    </tbody>
</table>
<a href="{{ route('pet.index') }}" class="btn btn-secondary">← Voltar</a>
@endsection
