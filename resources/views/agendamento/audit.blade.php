@extends('template/main', ['titulo'=>'PetShop','cabecalho'=>'Auditoria - Agendamento','rota'=>''])
@section('conteudo')
@include('partials.audit_table')
<a href="{{ route('agendamento.index') }}" class="btn btn-secondary mt-2">← Voltar</a>
@endsection
