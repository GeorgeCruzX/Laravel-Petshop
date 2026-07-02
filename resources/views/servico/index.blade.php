@extends('template/main', ['titulo'=>'PetShop','cabecalho'=>'Serviços','rota'=>'servico.create','class'=>App\Models\Servico::class])
@section('conteudo')
<table class="table align-middle table-striped">
    <thead>
        <th class="text-secondary">NOME</th>
        <th class="d-none d-md-table-cell text-secondary">DESCRIÇÃO</th>
        <th class="text-secondary">PREÇO</th>
        <th class="d-none d-md-table-cell text-secondary">DURAÇÃO</th>
        <th class="text-secondary">AÇÕES</th>
    </thead>
    <tbody>
        @forelse ($data as $item)
        <tr>
            <td>{{ $item->nome }}</td>
            <td class="d-none d-md-table-cell">{{ $item->descricao ?? '—' }}</td>
            <td>R$ {{ number_format($item->preco, 2, ',', '.') }}</td>
            <td class="d-none d-md-table-cell">{{ $item->duracao_minutos }} min</td>
            <td class="d-flex gap-1">
                @can('view', $item)
                <a href="{{ route('servico.show', $item->id) }}" class="btn btn-outline-info btn-sm">Ver</a>
                @endcan
                @can('update', $item)
                <a href="{{ route('servico.edit', $item->id) }}" class="btn btn-outline-success btn-sm">Editar</a>
                @endcan
                @can('delete', $item)
                <form action="{{ route('servico.destroy', $item->id) }}" method="POST">
                    @csrf @method('delete')
                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Confirmar exclusão?')">Excluir</button>
                </form>
                <a href="{{ route('servico.audit', $item->id) }}" class="btn btn-outline-warning btn-sm">Audit</a>
                @endcan
            </td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center text-muted">Nenhum serviço cadastrado.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
