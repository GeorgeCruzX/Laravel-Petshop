@extends('template/main', ['titulo'=>'PetShop','cabecalho'=>'Novo Agendamento','rota'=>''])
@section('conteudo')
<form action="{{ route('agendamento.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-5"><div class="form-floating mb-3">
            <select class="form-select @error('pet_id') is-invalid @enderror" name="pet_id">
                <option value="">Selecione o pet...</option>
                @foreach($pets as $p)
                <option value="{{ $p->id }}" {{ old('pet_id')==$p->id?'selected':'' }}>{{ $p->nome }} — {{ $p->cliente->nome ?? '' }}</option>
                @endforeach
            </select>
            <label>Pet *</label>
            @error('pet_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div></div>
        <div class="col-md-5"><div class="form-floating mb-3">
            <select class="form-select @error('servico_id') is-invalid @enderror" name="servico_id">
                <option value="">Selecione o serviço...</option>
                @foreach($servicos as $s)
                <option value="{{ $s->id }}" {{ old('servico_id')==$s->id?'selected':'' }}>{{ $s->nome }} — R$ {{ number_format($s->preco,2,',','.') }}</option>
                @endforeach
            </select>
            <label>Serviço *</label>
            @error('servico_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div></div>
    </div>
    <div class="row">
        <div class="col-md-4"><div class="form-floating mb-3">
            <input type="datetime-local" class="form-control @error('data_hora') is-invalid @enderror" name="data_hora" value="{{ old('data_hora') }}">
            <label>Data e Hora *</label>
            @error('data_hora')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div></div>
        <div class="col-md-3"><div class="form-floating mb-3">
            <select class="form-select @error('status') is-invalid @enderror" name="status">
                @foreach(['pendente','confirmado','concluido','cancelado'] as $s)
                <option value="{{ $s }}" {{ old('status','pendente')==$s?'selected':'' }}>{{ ucfirst($s) }}</option>
                @endforeach
            </select>
            <label>Status *</label>
        </div></div>
    </div>
    <div class="row"><div class="col-md-8"><div class="mb-3">
        <label class="form-label">Observações</label>
        <textarea class="form-control" name="observacoes" rows="3">{{ old('observacoes') }}</textarea>
    </div></div></div>
    <div class="mb-4">
        <a href="{{ route('agendamento.index') }}" class="btn btn-secondary me-2">← Voltar</a>
        <button type="submit" class="btn btn-success">Salvar ✓</button>
    </div>
</form>
@endsection
