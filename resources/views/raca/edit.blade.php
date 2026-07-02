@extends('template/main', ['titulo'=>'PetShop','cabecalho'=>'Editar Raça','rota'=>''])
@section('conteudo')
<form action="{{ route('raca.update', $raca->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="row"><div class="col-md-6">
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" placeholder="Nome" value="{{ old('nome', $raca->nome) }}">
            <label>Nome *</label>
            @error('nome')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div></div>
    <div class="row"><div class="col-md-6">
        <div class="form-floating mb-3">
            <select class="form-select @error('especie_id') is-invalid @enderror" name="especie_id">
                <option value="">Selecione...</option>
                @foreach($especies as $e)
                <option value="{{ $e->id }}" {{ old('especie_id', $raca->especie_id)==$e->id ? 'selected' : '' }}>{{ $e->nome }}</option>
                @endforeach
            </select>
            <label>Espécie *</label>
            @error('especie_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div></div>
    <div class="mb-4">
        <a href="{{ route('raca.index') }}" class="btn btn-secondary me-2">← Voltar</a>
        <button type="submit" class="btn btn-success">Atualizar ✓</button>
    </div>
</form>
@endsection
