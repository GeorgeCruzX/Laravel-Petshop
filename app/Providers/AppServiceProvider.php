<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Especie;
use App\Models\Raca;
use App\Models\Cliente;
use App\Models\Pet;
use App\Models\Servico;
use App\Models\Agendamento;
use App\Policies\EspeciePolicy;
use App\Policies\RacaPolicy;
use App\Policies\ClientePolicy;
use App\Policies\PetPolicy;
use App\Policies\ServicoPolicy;
use App\Policies\AgendamentoPolicy;
use App\Events\AuthenticationEvent;
use App\Listeners\AuthenticationListener;
use Illuminate\Support\Facades\Event;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        Especie::class     => EspeciePolicy::class,
        Raca::class        => RacaPolicy::class,
        Cliente::class     => ClientePolicy::class,
        Pet::class         => PetPolicy::class,
        Servico::class     => ServicoPolicy::class,
        Agendamento::class => AgendamentoPolicy::class,
    ];

    public function register(): void {}

    public function boot(): void
    {
        $this->registerPolicies();
        Event::listen(AuthenticationEvent::class, AuthenticationListener::class);
    }
}
