@extends('template/main', ['titulo'=>'PetShop','cabecalho'=>'Espécies','rota'=>'especie.create','class'=>App\Models\Especie::class])
@section('conteudo')
<table class="table align-middle table-striped">
    <thead>
        <th class="text-secondary">NOME</th>
        <th class="d-none d-md-table-cell text-secondary">DESCRIÇÃO</th>
        <th class="d-none d-md-table-cell text-secondary">RAÇAS</th>
        <th class="text-secondary">AÇÕES</th>
    </thead>
    <tbody>
        @forelse ($data as $item)
        <tr>
            <td>{{ $item->nome }}</td>
            <td class="d-none d-md-table-cell">{{ $item->descricao ?? '—' }}</td>
            <td class="d-none d-md-table-cell">{{ $item->raca->count() }}</td>
            <td class="d-flex gap-1">
                @can('view', $item)
                <a href="{{ route('especie.show', $item->id) }}" class="btn btn-outline-info btn-sm">Ver</a>
                @endcan
                @can('update', $item)
                <a href="{{ route('especie.edit', $item->id) }}" class="btn btn-outline-success btn-sm">Editar</a>
                @endcan
                @can('delete', $item)
                <form action="{{ route('especie.destroy', $item->id) }}" method="POST">
                    @csrf @method('delete')
                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Confirmar exclusão?')">Excluir</button>
                </form>
                <a href="{{ route('especie.audit', $item->id) }}" class="btn btn-outline-warning btn-sm">Audit</a>
                @endcan
            </td>
        </tr>
        @empty
        <tr><td colspan="4" class="text-center text-muted">Nenhuma espécie cadastrada.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
