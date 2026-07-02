@extends('template/main', ['titulo'=>'PetShop','cabecalho'=>'Detalhes do Serviço','rota'=>''])
@section('conteudo')
<div class="row"><div class="col-md-6"><div class="form-floating mb-3"><input type="text" class="form-control" value="{{ $servico->nome }}" disabled><label>Nome</label></div></div></div>
<div class="row"><div class="col-md-8"><div class="form-floating mb-3"><input type="text" class="form-control" value="{{ $servico->descricao ?? '—' }}" disabled><label>Descrição</label></div></div></div>
<div class="row">
    <div class="col-md-3"><div class="form-floating mb-3"><input type="text" class="form-control" value="R$ {{ number_format($servico->preco, 2, ',', '.') }}" disabled><label>Preço</label></div></div>
    <div class="col-md-3"><div class="form-floating mb-3"><input type="text" class="form-control" value="{{ $servico->duracao_minutos }} minutos" disabled><label>Duração</label></div></div>
</div>
<a href="{{ route('servico.index') }}" class="btn btn-secondary">← Voltar</a>
@endsection
