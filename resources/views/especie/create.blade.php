@extends('template/main', ['titulo'=>'PetShop','cabecalho'=>'Nova Espécie','rota'=>''])
@section('conteudo')
<form action="{{ route('especie.store') }}" method="POST">
    @csrf
    <div class="row"><div class="col-md-6">
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" placeholder="Nome" value="{{ old('nome') }}">
            <label>Nome *</label>
            @error('nome')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div></div>
    <div class="row"><div class="col-md-8">
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('descricao') is-invalid @enderror" name="descricao" placeholder="Descrição" value="{{ old('descricao') }}">
            <label>Descrição</label>
            @error('descricao')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div></div>
    <div class="mb-4">
        <a href="{{ route('especie.index') }}" class="btn btn-secondary me-2">← Voltar</a>
        <button type="submit" class="btn btn-success">Salvar ✓</button>
    </div>
</form>
@endsection
