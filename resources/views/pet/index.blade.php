@extends('template/main', ['titulo'=>'PetShop','cabecalho'=>'Pets','rota'=>'pet.create','class'=>App\Models\Pet::class])
@section('conteudo')
<table class="table align-middle table-striped">
    <thead>
        <th class="text-secondary">NOME</th>
        <th class="text-secondary">DONO</th>
        <th class="d-none d-md-table-cell text-secondary">RAÇA</th>
        <th class="d-none d-md-table-cell text-secondary">ESPÉCIE</th>
        <th class="d-none d-md-table-cell text-secondary">SEXO</th>
        <th class="text-secondary">AÇÕES</th>
    </thead>
    <tbody>
        @forelse ($data as $item)
        <tr>
            <td>{{ $item->nome }}</td>
            <td>{{ $item->cliente->nome ?? '—' }}</td>
            <td class="d-none d-md-table-cell">{{ $item->raca->nome ?? '—' }}</td>
            <td class="d-none d-md-table-cell">{{ $item->raca->especie->nome ?? '—' }}</td>
            <td class="d-none d-md-table-cell">{{ $item->sexo == 'M' ? 'Macho' : 'Fêmea' }}</td>
            <td class="d-flex gap-1">
                @can('view', $item)
                <a href="{{ route('pet.show', $item->id) }}" class="btn btn-outline-info btn-sm">Ver</a>
                @endcan
                @can('update', $item)
                <a href="{{ route('pet.edit', $item->id) }}" class="btn btn-outline-success btn-sm">Editar</a>
                @endcan
                @can('delete', $item)
                <form action="{{ route('pet.destroy', $item->id) }}" method="POST">
                    @csrf @method('delete')
                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Confirmar exclusão?')">Excluir</button>
                </form>
                <a href="{{ route('pet.audit', $item->id) }}" class="btn btn-outline-warning btn-sm">Audit</a>
                @endcan
            </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center text-muted">Nenhum pet cadastrado.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
