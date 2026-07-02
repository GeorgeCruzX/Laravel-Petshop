<?php

namespace App\Policies;

use App\Models\Raca;
use App\Models\User;
use App\Services\PermissionService;

class RacaPolicy
{
    public function __construct(protected PermissionService $service) {}

    public function viewAny(User $user): bool
    {
        return $this->service->isAuthorized('raca.index');
    }

    public function view(User $user, Raca $model): bool
    {
        return $this->service->isAuthorized('raca.show');
    }

    public function create(User $user): bool
    {
        return $this->service->isAuthorized('raca.create');
    }

    public function update(User $user, Raca $model): bool
    {
        return $this->service->isAuthorized('raca.edit');
    }

    public function delete(User $user, Raca $model): bool
    {
        return $this->service->isAuthorized('raca.delete');
    }

    public function restore(User $user, Raca $model): bool
    {
        return $this->service->isAuthorized('raca.delete');
    }

    public function forceDelete(User $user, Raca $model): bool
    {
        return $this->service->isAuthorized('raca.delete');
    }
}
