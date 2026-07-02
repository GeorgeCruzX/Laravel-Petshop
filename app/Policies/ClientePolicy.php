<?php

namespace App\Policies;

use App\Models\Cliente;
use App\Models\User;
use App\Services\PermissionService;

class ClientePolicy
{
    public function __construct(protected PermissionService $service) {}

    public function viewAny(User $user): bool
    {
        return $this->service->isAuthorized('cliente.index');
    }

    public function view(User $user, Cliente $model): bool
    {
        return $this->service->isAuthorized('cliente.show');
    }

    public function create(User $user): bool
    {
        return $this->service->isAuthorized('cliente.create');
    }

    public function update(User $user, Cliente $model): bool
    {
        return $this->service->isAuthorized('cliente.edit');
    }

    public function delete(User $user, Cliente $model): bool
    {
        return $this->service->isAuthorized('cliente.delete');
    }

    public function restore(User $user, Cliente $model): bool
    {
        return $this->service->isAuthorized('cliente.delete');
    }

    public function forceDelete(User $user, Cliente $model): bool
    {
        return $this->service->isAuthorized('cliente.delete');
    }
}
