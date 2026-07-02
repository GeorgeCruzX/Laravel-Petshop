<?php

namespace App\Services;

use App\Repositories\ClienteRepository;

class ClienteService extends BaseService
{
    public function __construct(protected ClienteRepository $repository) {}

    protected function getRepository(): mixed
    {
        return $this->repository;
    }
}
