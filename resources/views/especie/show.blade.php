@extends('template/main', ['titulo'=>'PetShop','cabecalho'=>'Detalhes da Espécie','rota'=>''])
@section('conteudo')
<div class="row"><div class="col-md-6">
    <div class="form-floating mb-3"><input type="text" class="form-control" value="{{ $especie->nome }}" disabled><label>Nome</label></div>
</div></div>
<div class="row"><div class="col-md-8">
    <div class="form-floating mb-3"><input type="text" class="form-control" value="{{ $especie->descricao ?? '—' }}" disabled><label>Descrição</label></div>
</div></div>
<h5 class="mt-3">Raças desta Espécie</h5>
<ul class="list-group mb-4">
    @forelse($especie->raca as $r)
    <li class="list-group-item">{{ $r->nome }}</li>
    @empty
    <li class="list-group-item text-muted">Nenhuma raça cadastrada.</li>
    @endforelse
</ul>
<a href="{{ route('especie.index') }}" class="btn btn-secondary">← Voltar</a>
@endsection
