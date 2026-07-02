<?php

namespace App\Policies;

use App\Models\Pet;
use App\Models\User;
use App\Services\PermissionService;

class PetPolicy
{
    public function __construct(protected PermissionService $service) {}

    public function viewAny(User $user): bool
    {
        return $this->service->isAuthorized('pet.index');
    }

    public function view(User $user, Pet $model): bool
    {
        return $this->service->isAuthorized('pet.show');
    }

    public function create(User $user): bool
    {
        return $this->service->isAuthorized('pet.create');
    }

    public function update(User $user, Pet $model): bool
    {
        return $this->service->isAuthorized('pet.edit');
    }

    public function delete(User $user, Pet $model): bool
    {
        return $this->service->isAuthorized('pet.delete');
    }

    public function restore(User $user, Pet $model): bool
    {
        return $this->service->isAuthorized('pet.delete');
    }

    public function forceDelete(User $user, Pet $model): bool
    {
        return $this->service->isAuthorized('pet.delete');
    }
}
