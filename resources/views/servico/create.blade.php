@extends('template/main', ['titulo'=>'PetShop','cabecalho'=>'Novo Serviço','rota'=>''])
@section('conteudo')
<form action="{{ route('servico.store') }}" method="POST">
    @csrf
    <div class="row"><div class="col-md-6"><div class="form-floating mb-3">
        <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" placeholder="Nome" value="{{ old('nome') }}">
        <label>Nome *</label>
        @error('nome')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div></div></div>
    <div class="row"><div class="col-md-8"><div class="form-floating mb-3">
        <input type="text" class="form-control @error('descricao') is-invalid @enderror" name="descricao" placeholder="Descrição" value="{{ old('descricao') }}">
        <label>Descrição</label>
    </div></div></div>
    <div class="row">
        <div class="col-md-3"><div class="form-floating mb-3">
            <input type="number" step="0.01" min="0" class="form-control @error('preco') is-invalid @enderror" name="preco" placeholder="Preço" value="{{ old('preco') }}">
            <label>Preço (R$) *</label>
            @error('preco')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div></div>
        <div class="col-md-3"><div class="form-floating mb-3">
            <input type="number" min="1" class="form-control @error('duracao_minutos') is-invalid @enderror" name="duracao_minutos" placeholder="Duração" value="{{ old('duracao_minutos', 60) }}">
            <label>Duração (min) *</label>
            @error('duracao_minutos')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div></div>
    </div>
    <div class="mb-4">
        <a href="{{ route('servico.index') }}" class="btn btn-secondary me-2">← Voltar</a>
        <button type="submit" class="btn btn-success">Salvar ✓</button>
    </div>
</form>
@endsection
