@extends('template/main', ['titulo'=>'PetShop','cabecalho'=>'Auditoria - Pet','rota'=>''])
@section('conteudo')
@include('partials.audit_table')
<a href="{{ route('pet.index') }}" class="btn btn-secondary mt-2">← Voltar</a>
@endsection
