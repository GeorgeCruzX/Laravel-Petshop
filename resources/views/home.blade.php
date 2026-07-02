@extends('template/main', ['titulo'=>'PetShop - Home','cabecalho'=>'Dashboard','rota'=>''])
@section('conteudo')
<div class="row g-4 mb-4">
    @can('viewAny', App\Models\Cliente::class)
    <div class="col-6 col-md-4 col-lg-2">
        <a href="{{ route('cliente.index') }}" class="text-decoration-none">
            <div class="card text-center border-0 shadow-sm h-100" style="background:#e8f5e9">
                <div class="card-body py-4">
                    <div class="fs-1">👤</div>
                    <div class="fw-bold text-success mt-2">Clientes</div>
                </div>
            </div>
        </a>
    </div>
    @endcan
    @can('viewAny', App\Models\Pet::class)
    <div class="col-6 col-md-4 col-lg-2">
        <a href="{{ route('pet.index') }}" class="text-decoration-none">
            <div class="card text-center border-0 shadow-sm h-100" style="background:#e3f2fd">
                <div class="card-body py-4">
                    <div class="fs-1">🐾</div>
                    <div class="fw-bold text-primary mt-2">Pets</div>
                </div>
            </div>
        </a>
    </div>
    @endcan
    @can('viewAny', App\Models\Agendamento::class)
    <div class="col-6 col-md-4 col-lg-2">
        <a href="{{ route('agendamento.index') }}" class="text-decoration-none">
            <div class="card text-center border-0 shadow-sm h-100" style="background:#fff3e0">
                <div class="card-body py-4">
                    <div class="fs-1">📅</div>
                    <div class="fw-bold text-warning mt-2">Agendamentos</div>
                </div>
            </div>
        </a>
    </div>
    @endcan
    @can('viewAny', App\Models\Servico::class)
    <div class="col-6 col-md-4 col-lg-2">
        <a href="{{ route('servico.index') }}" class="text-decoration-none">
            <div class="card text-center border-0 shadow-sm h-100" style="background:#fce4ec">
                <div class="card-body py-4">
                    <div class="fs-1">✂️</div>
                    <div class="fw-bold text-danger mt-2">Serviços</div>
                </div>
            </div>
        </a>
    </div>
    @endcan
    @can('viewAny', App\Models\Especie::class)
    <div class="col-6 col-md-4 col-lg-2">
        <a href="{{ route('especie.index') }}" class="text-decoration-none">
            <div class="card text-center border-0 shadow-sm h-100" style="background:#f3e5f5">
                <div class="card-body py-4">
                    <div class="fs-1">🐕</div>
                    <div class="fw-bold text-purple mt-2" style="color:#7b1fa2">Espécies</div>
                </div>
            </div>
        </a>
    </div>
    @endcan
    @can('viewAny', App\Models\Raca::class)
    <div class="col-6 col-md-4 col-lg-2">
        <a href="{{ route('raca.index') }}" class="text-decoration-none">
            <div class="card text-center border-0 shadow-sm h-100" style="background:#e0f2f1">
                <div class="card-body py-4">
                    <div class="fs-1">🐈</div>
                    <div class="fw-bold mt-2" style="color:#00695c">Raças</div>
                </div>
            </div>
        </a>
    </div>
    @endcan
</div>
<div class="alert alert-success border-0 shadow-sm">
    <strong>🐾 Bem-vindo ao Sistema PetShop!</strong>
    Você está logado como <strong>{{ Auth::user()->name }}</strong>
    ({{ Auth::user()->role->name ?? 'sem perfil' }}).
</div>
@endsection
