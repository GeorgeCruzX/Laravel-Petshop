<?php

namespace App\Services;

use App\Repositories\EspecieRepository;

class EspecieService extends BaseService
{
    public function __construct(protected EspecieRepository $repository) {}

    protected function getRepository(): mixed
    {
        return $this->repository;
    }
}
