@extends('template/main', ['titulo'=>'PetShop','cabecalho'=>'Auditoria - Raça','rota'=>''])
@section('conteudo')
@include('partials.audit_table')
<a href="{{ route('raca.index') }}" class="btn btn-secondary mt-2">← Voltar</a>
@endsection
