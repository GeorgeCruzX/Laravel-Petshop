@extends('template/main', ['titulo'=>'PetShop','cabecalho'=>'Auditoria - Cliente','rota'=>''])
@section('conteudo')
@include('partials.audit_table')
<a href="{{ route('cliente.index') }}" class="btn btn-secondary mt-2">← Voltar</a>
@endsection
