@extends('template/main', ['titulo'=>'PetShop','cabecalho'=>'Novo Cliente','rota'=>''])
@section('conteudo')
<form action="{{ route('cliente.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-8"><div class="form-floating mb-3">
            <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" placeholder="Nome" value="{{ old('nome') }}">
            <label>Nome Completo *</label>
            @error('nome')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div></div>
    </div>
    <div class="row">
        <div class="col-md-4"><div class="form-floating mb-3">
            <input type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" placeholder="CPF" value="{{ old('cpf') }}">
            <label>CPF *</label>
            @error('cpf')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div></div>
        <div class="col-md-4"><div class="form-floating mb-3">
            <input type="text" class="form-control @error('telefone') is-invalid @enderror" name="telefone" placeholder="Telefone" value="{{ old('telefone') }}">
            <label>Telefone</label>
            @error('telefone')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div></div>
    </div>
    <div class="row">
        <div class="col-md-6"><div class="form-floating mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="E-mail" value="{{ old('email') }}">
            <label>E-mail</label>
            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div></div>
    </div>
    <div class="row">
        <div class="col-md-8"><div class="form-floating mb-3">
            <input type="text" class="form-control @error('endereco') is-invalid @enderror" name="endereco" placeholder="Endereço" value="{{ old('endereco') }}">
            <label>Endereço</label>
            @error('endereco')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div></div>
    </div>
    <div class="mb-4">
        <a href="{{ route('cliente.index') }}" class="btn btn-secondary me-2">← Voltar</a>
        <button type="submit" class="btn btn-success">Salvar ✓</button>
    </div>
</form>
@endsection
