@extends('template/main', ['titulo'=>'PetShop','cabecalho'=>'Detalhes da Raça','rota'=>''])
@section('conteudo')
<div class="row"><div class="col-md-6">
    <div class="form-floating mb-3"><input type="text" class="form-control" value="{{ $raca->nome }}" disabled><label>Nome</label></div>
</div></div>
<div class="row"><div class="col-md-6">
    <div class="form-floating mb-3"><input type="text" class="form-control" value="{{ $raca->especie->nome ?? '—' }}" disabled><label>Espécie</label></div>
</div></div>
<h5 class="mt-3">Pets desta Raça</h5>
<ul class="list-group mb-4">
    @forelse($raca->pet as $p)
    <li class="list-group-item">{{ $p->nome }} — {{ $p->cliente->nome ?? '—' }}</li>
    @empty
    <li class="list-group-item text-muted">Nenhum pet cadastrado.</li>
    @endforelse
</ul>
<a href="{{ route('raca.index') }}" class="btn btn-secondary">← Voltar</a>
@endsection
