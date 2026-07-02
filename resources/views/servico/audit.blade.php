@extends('template/main', ['titulo'=>'PetShop','cabecalho'=>'Auditoria - Serviço','rota'=>''])
@section('conteudo')
@include('partials.audit_table')
<a href="{{ route('servico.index') }}" class="btn btn-secondary mt-2">← Voltar</a>
@endsection
