@extends('template/main', ['titulo'=>'PetShop','cabecalho'=>'Detalhes do Agendamento','rota'=>''])
@section('conteudo')
@php $colors = ['pendente'=>'secondary','confirmado'=>'primary','concluido'=>'success','cancelado'=>'danger']; @endphp
<div class="row">
    <div class="col-md-4"><div class="form-floating mb-3"><input type="text" class="form-control" value="{{ $agendamento->pet->nome ?? '—' }}" disabled><label>Pet</label></div></div>
    <div class="col-md-4"><div class="form-floating mb-3"><input type="text" class="form-control" value="{{ $agendamento->pet->cliente->nome ?? '—' }}" disabled><label>Dono</label></div></div>
</div>
<div class="row">
    <div class="col-md-4"><div class="form-floating mb-3"><input type="text" class="form-control" value="{{ $agendamento->pet->raca->especie->nome ?? '—' }}" disabled><label>Espécie</label></div></div>
    <div class="col-md-4"><div class="form-floating mb-3"><input type="text" class="form-control" value="{{ $agendamento->servico->nome ?? '—' }}" disabled><label>Serviço</label></div></div>
    <div class="col-md-3"><div class="form-floating mb-3"><input type="text" class="form-control" value="R$ {{ number_format($agendamento->servico->preco ?? 0, 2, ',', '.') }}" disabled><label>Valor</label></div></div>
</div>
<div class="row">
    <div class="col-md-4"><div class="form-floating mb-3"><input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($agendamento->data_hora)->format('d/m/Y H:i') }}" disabled><label>Data/Hora</label></div></div>
    <div class="col-md-3"><div class="mb-3 pt-2"><span class="badge bg-{{ $colors[$agendamento->status] ?? 'secondary' }} fs-6 px-3 py-2">{{ ucfirst($agendamento->status) }}</span></div></div>
</div>
@if($agendamento->observacoes)
<div class="row"><div class="col-md-8"><div class="mb-3">
    <label class="form-label">Observações</label>
    <textarea class="form-control" rows="3" disabled>{{ $agendamento->observacoes }}</textarea>
</div></div></div>
@endif
<a href="{{ route('agendamento.index') }}" class="btn btn-secondary">← Voltar</a>
@endsection
