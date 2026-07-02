@extends('template/main', ['titulo'=>'PetShop','cabecalho'=>'Agendamentos','rota'=>'agendamento.create','class'=>App\Models\Agendamento::class])
@section('conteudo')
<table class="table align-middle table-striped">
    <thead>
        <th class="text-secondary">PET</th>
        <th class="d-none d-md-table-cell text-secondary">DONO</th>
        <th class="text-secondary">SERVIÇO</th>
        <th class="text-secondary">DATA/HORA</th>
        <th class="text-secondary">STATUS</th>
        <th class="text-secondary">AÇÕES</th>
    </thead>
    <tbody>
        @forelse ($data as $item)
        @php $colors = ['pendente'=>'secondary','confirmado'=>'primary','concluido'=>'success','cancelado'=>'danger']; @endphp
        <tr>
            <td>{{ $item->pet->nome ?? '—' }}</td>
            <td class="d-none d-md-table-cell">{{ $item->pet->cliente->nome ?? '—' }}</td>
            <td>{{ $item->servico->nome ?? '—' }}</td>
            <td>{{ \Carbon\Carbon::parse($item->data_hora)->format('d/m/Y H:i') }}</td>
            <td><span class="badge bg-{{ $colors[$item->status] ?? 'secondary' }}">{{ ucfirst($item->status) }}</span></td>
            <td class="d-flex gap-1">
                @can('view', $item)
                <a href="{{ route('agendamento.show', $item->id) }}" class="btn btn-outline-info btn-sm">Ver</a>
                @endcan
                @can('update', $item)
                <a href="{{ route('agendamento.edit', $item->id) }}" class="btn btn-outline-success btn-sm">Editar</a>
                @endcan
                @can('delete', $item)
                <form action="{{ route('agendamento.destroy', $item->id) }}" method="POST">
                    @csrf @method('delete')
                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Confirmar exclusão?')">Excluir</button>
                </form>
                <a href="{{ route('agendamento.audit', $item->id) }}" class="btn btn-outline-warning btn-sm">Audit</a>
                @endcan
            </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center text-muted">Nenhum agendamento cadastrado.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
