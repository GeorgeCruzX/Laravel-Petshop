<?php

namespace App\Services;

use App\Repositories\ServicoRepository;

class ServicoService extends BaseService
{
    public function __construct(protected ServicoRepository $repository) {}

    protected function getRepository(): mixed
    {
        return $this->repository;
    }
}
