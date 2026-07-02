@extends('template/main', ['titulo'=>'PetShop','cabecalho'=>'Clientes','rota'=>'cliente.create','class'=>App\Models\Cliente::class])
@section('conteudo')
<table class="table align-middle table-striped">
    <thead>
        <th class="text-secondary">NOME</th>
        <th class="d-none d-md-table-cell text-secondary">CPF</th>
        <th class="d-none d-md-table-cell text-secondary">TELEFONE</th>
        <th class="d-none d-md-table-cell text-secondary">PETS</th>
        <th class="text-secondary">AÇÕES</th>
    </thead>
    <tbody>
        @forelse ($data as $item)
        <tr>
            <td>{{ $item->nome }}</td>
            <td class="d-none d-md-table-cell">{{ $item->cpf }}</td>
            <td class="d-none d-md-table-cell">{{ $item->telefone ?? '—' }}</td>
            <td class="d-none d-md-table-cell">{{ $item->pet->count() }}</td>
            <td class="d-flex gap-1">
                @can('view', $item)
                <a href="{{ route('cliente.show', $item->id) }}" class="btn btn-outline-info btn-sm">Ver</a>
                @endcan
                @can('update', $item)
                <a href="{{ route('cliente.edit', $item->id) }}" class="btn btn-outline-success btn-sm">Editar</a>
                @endcan
                @can('delete', $item)
                <form action="{{ route('cliente.destroy', $item->id) }}" method="POST">
                    @csrf @method('delete')
                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Confirmar exclusão?')">Excluir</button>
                </form>
                <a href="{{ route('cliente.audit', $item->id) }}" class="btn btn-outline-warning btn-sm">Audit</a>
                @endcan
            </td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center text-muted">Nenhum cliente cadastrado.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
