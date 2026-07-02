@extends('template/main', ['titulo'=>'PetShop','cabecalho'=>'Novo Pet','rota'=>''])
@section('conteudo')
<form action="{{ route('pet.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-5"><div class="form-floating mb-3">
            <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" placeholder="Nome" value="{{ old('nome') }}">
            <label>Nome do Pet *</label>
            @error('nome')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div></div>
        <div class="col-md-3"><div class="form-floating mb-3">
            <input type="date" class="form-control @error('data_nascimento') is-invalid @enderror" name="data_nascimento" value="{{ old('data_nascimento') }}">
            <label>Data de Nascimento</label>
        </div></div>
        <div class="col-md-2"><div class="form-floating mb-3">
            <select class="form-select @error('sexo') is-invalid @enderror" name="sexo">
                <option value="M" {{ old('sexo')=='M'?'selected':'' }}>Macho</option>
                <option value="F" {{ old('sexo')=='F'?'selected':'' }}>Fêmea</option>
            </select>
            <label>Sexo *</label>
        </div></div>
    </div>
    <div class="row">
        <div class="col-md-5"><div class="form-floating mb-3">
            <select class="form-select @error('cliente_id') is-invalid @enderror" name="cliente_id">
                <option value="">Selecione o dono...</option>
                @foreach($clientes as $c)
                <option value="{{ $c->id }}" {{ old('cliente_id')==$c->id?'selected':'' }}>{{ $c->nome }}</option>
                @endforeach
            </select>
            <label>Dono (Cliente) *</label>
            @error('cliente_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div></div>
        <div class="col-md-5"><div class="form-floating mb-3">
            <select class="form-select @error('raca_id') is-invalid @enderror" name="raca_id">
                <option value="">Selecione a raça...</option>
                @foreach($racas as $r)
                <option value="{{ $r->id }}" {{ old('raca_id')==$r->id?'selected':'' }}>{{ $r->nome }} ({{ $r->especie->nome ?? '' }})</option>
                @endforeach
            </select>
            <label>Raça *</label>
            @error('raca_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div></div>
    </div>
    <div class="mb-4">
        <a href="{{ route('pet.index') }}" class="btn btn-secondary me-2">← Voltar</a>
        <button type="submit" class="btn btn-success">Salvar ✓</button>
    </div>
</form>
@endsection
