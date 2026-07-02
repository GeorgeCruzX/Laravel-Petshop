<table class="table align-middle table-striped">
    <thead>
        <th class="text-secondary">AÇÃO</th>
        <th class="text-secondary">AUTOR</th>
        <th class="d-none d-md-table-cell text-secondary">DATA/HORA</th>
        <th class="d-none d-md-table-cell text-secondary">VALOR ANTERIOR</th>
        <th class="text-secondary">VALOR NOVO</th>
    </thead>
    <tbody>
        @forelse ($data as $audit)
        <tr>
            <td><span class="badge bg-{{ $audit->event=='created'?'success':($audit->event=='updated'?'warning':'danger') }}">{{ strtoupper($audit->event) }}</span></td>
            <td>{{ $audit->user->name ?? 'Sistema' }}</td>
            <td class="d-none d-md-table-cell">{{ $audit->created_at->format('d/m/Y H:i') }}</td>
            <td class="d-none d-md-table-cell small">
                @if(count($audit->old_values)==0) <span class="text-muted">—</span>
                @else @foreach($audit->old_values as $k=>$v)<p class="mb-0"><strong>{{ strtoupper($k) }}:</strong> {{ $v }}</p>@endforeach
                @endif
            </td>
            <td class="small">
                @if(count($audit->new_values)==0) <span class="text-muted">—</span>
                @else @foreach($audit->new_values as $k=>$v)<p class="mb-0"><strong>{{ strtoupper($k) }}:</strong> {{ $v }}</p>@endforeach
                @endif
            </td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center text-muted">Nenhuma auditoria encontrada.</td></tr>
        @endforelse
    </tbody>
</table>
