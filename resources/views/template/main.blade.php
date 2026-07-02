<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>{{ $titulo ?? 'PetShop' }}</title>
    <style>
        body { background-color: #f8f9fa; }
        button { border: none; outline: none; background: none; cursor: pointer; }
        form { display: inline; }
        .navbar-brand svg { filter: drop-shadow(1px 1px 2px rgba(0,0,0,0.3)); }
        .btn-action { width: 38px; height: 38px; display: inline-flex; align-items: center; justify-content: center; }
        .alert-flash { position: fixed; top: 70px; right: 20px; z-index: 1055; min-width: 300px; }
    </style>
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-md navbar-dark" style="background-color:#2c7a3e;">
        <div class="container-fluid">
            <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="white" viewBox="0 0 16 16">
                    <path d="M8 1a2 2 0 0 1 2 2c0 .537-.213 1.022-.557 1.381l.19.131A2.5 2.5 0 0 1 11 7h.5A1.5 1.5 0 0 1 13 8.5v3A1.5 1.5 0 0 1 11.5 13H11a1 1 0 0 1-2 0H7a1 1 0 0 1-2 0h-.5A1.5 1.5 0 0 1 3 11.5v-3A1.5 1.5 0 0 1 4.5 7H5a2.5 2.5 0 0 1 1.367-2.248l.19-.131A2 2 0 0 1 6 3a2 2 0 0 1 2-2M6.5 3a1.5 1.5 0 1 0 3 0 1.5 1.5 0 0 0-3 0M4 7.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3m8 0a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
                </svg>
                <span class="fs-5 fw-bold">PetShop</span>
            </a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#itens">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="itens">
                <ul class="navbar-nav ms-auto align-items-center gap-1">

                    @can('viewAny', App\Models\Cliente::class)
                    <li class="nav-item">
                        <a href="{{ route('cliente.index') }}" class="nav-link text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16" class="me-1"><path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/></svg>
                            Clientes
                        </a>
                    </li>
                    @endcan

                    @can('viewAny', App\Models\Pet::class)
                    <li class="nav-item">
                        <a href="{{ route('pet.index') }}" class="nav-link text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16" class="me-1"><path d="M8 1a2 2 0 0 1 2 2c0 .537-.213 1.022-.557 1.381l.19.131A2.5 2.5 0 0 1 11 7h.5A1.5 1.5 0 0 1 13 8.5v3A1.5 1.5 0 0 1 11.5 13H11a1 1 0 0 1-2 0H7a1 1 0 0 1-2 0h-.5A1.5 1.5 0 0 1 3 11.5v-3A1.5 1.5 0 0 1 4.5 7H5a2.5 2.5 0 0 1 1.367-2.248l.19-.131A2 2 0 0 1 6 3a2 2 0 0 1 2-2"/></svg>
                            Pets
                        </a>
                    </li>
                    @endcan

                    @can('viewAny', App\Models\Agendamento::class)
                    <li class="nav-item">
                        <a href="{{ route('agendamento.index') }}" class="nav-link text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16" class="me-1"><path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/></svg>
                            Agendamentos
                        </a>
                    </li>
                    @endcan

                    @can('viewAny', App\Models\Servico::class)
                    <li class="nav-item">
                        <a href="{{ route('servico.index') }}" class="nav-link text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16" class="me-1"><path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708z"/></svg>
                            Serviços
                        </a>
                    </li>
                    @endcan

                    @can('viewAny', App\Models\Especie::class)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" href="#">Cadastros</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('especie.index') }}">Espécies</a></li>
                            <li><a class="dropdown-item" href="{{ route('raca.index') }}">Raças</a></li>
                        </ul>
                    </li>
                    @endcan

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16"><path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/><path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/></svg>
                            @auth {{ explode(' ', Auth::user()->name)[0] }} @endauth
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Perfil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" style="display:block">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">Sair</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show alert-flash" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold text-success mb-0">{{ $cabecalho ?? '' }}</h4>
            @if(isset($rota) && isset($class))
                @can('create', $class)
                <a href="{{ route($rota) }}" class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/></svg>
                    Novo
                </a>
                @endcan
            @endif
        </div>

        @yield('conteudo')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        setTimeout(() => {
            document.querySelectorAll('.alert-flash').forEach(el => {
                new bootstrap.Alert(el).close();
            });
        }, 4000);
    </script>
</body>
</html>
