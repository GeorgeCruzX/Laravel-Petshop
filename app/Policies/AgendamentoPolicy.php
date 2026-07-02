<?php

namespace App\Policies;

use App\Models\Agendamento;
use App\Models\User;
use App\Services\PermissionService;

class AgendamentoPolicy
{
    public function __construct(protected PermissionService $service) {}

    public function viewAny(User $user): bool
    {
        return $this->service->isAuthorized('agendamento.index');
    }

    public function view(User $user, Agendamento $model): bool
    {
        return $this->service->isAuthorized('agendamento.show');
    }

    public function create(User $user): bool
    {
        return $this->service->isAuthorized('agendamento.create');
    }

    public function update(User $user, Agendamento $model): bool
    {
        return $this->service->isAuthorized('agendamento.edit');
    }

    public function delete(User $user, Agendamento $model): bool
    {
        return $this->service->isAuthorized('agendamento.delete');
    }

    public function restore(User $user, Agendamento $model): bool
    {
        return $this->service->isAuthorized('agendamento.delete');
    }

    public function forceDelete(User $user, Agendamento $model): bool
    {
        return $this->service->isAuthorized('agendamento.delete');
    }
}
