<?php

namespace App\Services;

use App\Repositories\RacaRepository;

class RacaService extends BaseService
{
    public function __construct(protected RacaRepository $repository) {}

    protected function getRepository(): mixed
    {
        return $this->repository;
    }
}
