<?php

namespace App\Policies;

use App\Models\Servico;
use App\Models\User;
use App\Services\PermissionService;

class ServicoPolicy
{
    public function __construct(protected PermissionService $service) {}

    public function viewAny(User $user): bool
    {
        return $this->service->isAuthorized('servico.index');
    }

    public function view(User $user, Servico $model): bool
    {
        return $this->service->isAuthorized('servico.show');
    }

    public function create(User $user): bool
    {
        return $this->service->isAuthorized('servico.create');
    }

    public function update(User $user, Servico $model): bool
    {
        return $this->service->isAuthorized('servico.edit');
    }

    public function delete(User $user, Servico $model): bool
    {
        return $this->service->isAuthorized('servico.delete');
    }

    public function restore(User $user, Servico $model): bool
    {
        return $this->service->isAuthorized('servico.delete');
    }

    public function forceDelete(User $user, Servico $model): bool
    {
        return $this->service->isAuthorized('servico.delete');
    }
}
