@extends('template/main', ['titulo'=>'PetShop','cabecalho'=>'Editar Serviço','rota'=>''])
@section('conteudo')
<form action="{{ route('servico.update', $servico->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="row"><div class="col-md-6"><div class="form-floating mb-3">
        <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" placeholder="Nome" value="{{ old('nome', $servico->nome) }}">
        <label>Nome *</label>
        @error('nome')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div></div></div>
    <div class="row"><div class="col-md-8"><div class="form-floating mb-3">
        <input type="text" class="form-control" name="descricao" placeholder="Descrição" value="{{ old('descricao', $servico->descricao) }}">
        <label>Descrição</label>
    </div></div></div>
    <div class="row">
        <div class="col-md-3"><div class="form-floating mb-3">
            <input type="number" step="0.01" min="0" class="form-control @error('preco') is-invalid @enderror" name="preco" placeholder="Preço" value="{{ old('preco', $servico->preco) }}">
            <label>Preço (R$) *</label>
        </div></div>
        <div class="col-md-3"><div class="form-floating mb-3">
            <input type="number" min="1" class="form-control" name="duracao_minutos" placeholder="Duração" value="{{ old('duracao_minutos', $servico->duracao_minutos) }}">
            <label>Duração (min) *</label>
        </div></div>
    </div>
    <div class="mb-4">
        <a href="{{ route('servico.index') }}" class="btn btn-secondary me-2">← Voltar</a>
        <button type="submit" class="btn btn-success">Atualizar ✓</button>
    </div>
</form>
@endsection
