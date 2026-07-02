@extends('template/main', ['titulo'=>'PetShop','cabecalho'=>'Raças','rota'=>'raca.create','class'=>App\Models\Raca::class])
@section('conteudo')
<table class="table align-middle table-striped">
    <thead>
        <th class="text-secondary">NOME</th>
        <th class="text-secondary">ESPÉCIE</th>
        <th class="text-secondary">AÇÕES</th>
    </thead>
    <tbody>
        @forelse ($data as $item)
        <tr>
            <td>{{ $item->nome }}</td>
            <td>{{ $item->especie->nome ?? '—' }}</td>
            <td class="d-flex gap-1">
                @can('view', $item)
                <a href="{{ route('raca.show', $item->id) }}" class="btn btn-outline-info btn-sm">Ver</a>
                @endcan
                @can('update', $item)
                <a href="{{ route('raca.edit', $item->id) }}" class="btn btn-outline-success btn-sm">Editar</a>
                @endcan
                @can('delete', $item)
                <form action="{{ route('raca.destroy', $item->id) }}" method="POST">
                    @csrf @method('delete')
                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Confirmar exclusão?')">Excluir</button>
                </form>
                <a href="{{ route('raca.audit', $item->id) }}" class="btn btn-outline-warning btn-sm">Audit</a>
                @endcan
            </td>
        </tr>
        @empty
        <tr><td colspan="3" class="text-center text-muted">Nenhuma raça cadastrada.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
