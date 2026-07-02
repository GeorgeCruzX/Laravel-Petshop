@extends('template/main', ['titulo'=>'PetShop','cabecalho'=>'Detalhes do Cliente','rota'=>''])
@section('conteudo')
<div class="row">
    <div class="col-md-8"><div class="form-floating mb-3"><input type="text" class="form-control" value="{{ $cliente->nome }}" disabled><label>Nome</label></div></div>
</div>
<div class="row">
    <div class="col-md-4"><div class="form-floating mb-3"><input type="text" class="form-control" value="{{ $cliente->cpf }}" disabled><label>CPF</label></div></div>
    <div class="col-md-4"><div class="form-floating mb-3"><input type="text" class="form-control" value="{{ $cliente->telefone ?? '—' }}" disabled><label>Telefone</label></div></div>
</div>
<div class="row">
    <div class="col-md-6"><div class="form-floating mb-3"><input type="text" class="form-control" value="{{ $cliente->email ?? '—' }}" disabled><label>E-mail</label></div></div>
</div>
<div class="row">
    <div class="col-md-8"><div class="form-floating mb-3"><input type="text" class="form-control" value="{{ $cliente->endereco ?? '—' }}" disabled><label>Endereço</label></div></div>
</div>
<h5 class="mt-3">Pets do Cliente</h5>
<table class="table table-sm table-bordered mb-4">
    <thead><th>Nome</th><th>Raça</th><th>Espécie</th><th>Sexo</th></thead>
    <tbody>
        @forelse($cliente->pet as $p)
        <tr>
            <td>{{ $p->nome }}</td>
            <td>{{ $p->raca->nome ?? '—' }}</td>
            <td>{{ $p->raca->especie->nome ?? '—' }}</td>
            <td>{{ $p->sexo == 'M' ? 'Macho' : 'Fêmea' }}</td>
        </tr>
        @empty
        <tr><td colspan="4" class="text-muted">Nenhum pet.</td></tr>
        @endforelse
    </tbody>
</table>
<a href="{{ route('cliente.index') }}" class="btn btn-secondary">← Voltar</a>
@endsection
