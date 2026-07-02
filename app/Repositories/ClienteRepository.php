<?php

namespace App\Repositories;

use App\Models\Cliente;

class ClienteRepository extends BaseRepository
{
    public function __construct(protected Cliente $model) {}

    protected function getModel(): mixed
    {
        return $this->model->newInstance();
    }
}
