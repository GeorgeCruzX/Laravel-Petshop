<?php

namespace App\Policies;

use App\Models\Especie;
use App\Models\User;
use App\Services\PermissionService;

class EspeciePolicy
{
    public function __construct(protected PermissionService $service) {}

    public function viewAny(User $user): bool
    {
        return $this->service->isAuthorized('especie.index');
    }

    public function view(User $user, Especie $model): bool
    {
        return $this->service->isAuthorized('especie.show');
    }

    public function create(User $user): bool
    {
        return $this->service->isAuthorized('especie.create');
    }

    public function update(User $user, Especie $model): bool
    {
        return $this->service->isAuthorized('especie.edit');
    }

    public function delete(User $user, Especie $model): bool
    {
        return $this->service->isAuthorized('especie.delete');
    }

    public function restore(User $user, Especie $model): bool
    {
        return $this->service->isAuthorized('especie.delete');
    }

    public function forceDelete(User $user, Especie $model): bool
    {
        return $this->service->isAuthorized('especie.delete');
    }
}
