@extends('template/main', ['titulo'=>'PetShop','cabecalho'=>'Editar Agendamento','rota'=>''])
@section('conteudo')
<form action="{{ route('agendamento.update', $agendamento->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="row">
        <div class="col-md-5"><div class="form-floating mb-3">
            <select class="form-select @error('pet_id') is-invalid @enderror" name="pet_id">
                <option value="">Selecione o pet...</option>
                @foreach($pets as $p)
                <option value="{{ $p->id }}" {{ old('pet_id',$agendamento->pet_id)==$p->id?'selected':'' }}>{{ $p->nome }} — {{ $p->cliente->nome ?? '' }}</option>
                @endforeach
            </select>
            <label>Pet *</label>
        </div></div>
        <div class="col-md-5"><div class="form-floating mb-3">
            <select class="form-select @error('servico_id') is-invalid @enderror" name="servico_id">
                <option value="">Selecione o serviço...</option>
                @foreach($servicos as $s)
                <option value="{{ $s->id }}" {{ old('servico_id',$agendamento->servico_id)==$s->id?'selected':'' }}>{{ $s->nome }} — R$ {{ number_format($s->preco,2,',','.') }}</option>
                @endforeach
            </select>
            <label>Serviço *</label>
        </div></div>
    </div>
    <div class="row">
        <div class="col-md-4"><div class="form-floating mb-3">
            <input type="datetime-local" class="form-control" name="data_hora" value="{{ old('data_hora', \Carbon\Carbon::parse($agendamento->data_hora)->format('Y-m-d\TH:i')) }}">
            <label>Data e Hora *</label>
        </div></div>
        <div class="col-md-3"><div class="form-floating mb-3">
            <select class="form-select" name="status">
                @foreach(['pendente','confirmado','concluido','cancelado'] as $s)
                <option value="{{ $s }}" {{ old('status',$agendamento->status)==$s?'selected':'' }}>{{ ucfirst($s) }}</option>
                @endforeach
            </select>
            <label>Status *</label>
        </div></div>
    </div>
    <div class="row"><div class="col-md-8"><div class="mb-3">
        <label class="form-label">Observações</label>
        <textarea class="form-control" name="observacoes" rows="3">{{ old('observacoes', $agendamento->observacoes) }}</textarea>
    </div></div></div>
    <div class="mb-4">
        <a href="{{ route('agendamento.index') }}" class="btn btn-secondary me-2">← Voltar</a>
        <button type="submit" class="btn btn-success">Atualizar ✓</button>
    </div>
</form>
@endsection
