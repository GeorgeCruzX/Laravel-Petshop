@extends('template/main', ['titulo'=>'PetShop','cabecalho'=>'Auditoria - Espécie','rota'=>''])
@section('conteudo')
@include('partials.audit_table')
<a href="{{ route('especie.index') }}" class="btn btn-secondary mt-2">← Voltar</a>
@endsection
