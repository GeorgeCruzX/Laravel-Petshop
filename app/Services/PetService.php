<?php

namespace App\Services;

use App\Repositories\PetRepository;

class PetService extends BaseService
{
    public function __construct(protected PetRepository $repository) {}

    protected function getRepository(): mixed
    {
        return $this->repository;
    }
}
