<?php

namespace App\Services;

use App\Repositories\AgendamentoRepository;

class AgendamentoService extends BaseService
{
    public function __construct(protected AgendamentoRepository $repository) {}

    protected function getRepository(): mixed
    {
        return $this->repository;
    }
}
