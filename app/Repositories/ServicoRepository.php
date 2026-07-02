<?php

namespace App\Repositories;

use App\Models\Servico;

class ServicoRepository extends BaseRepository
{
    public function __construct(protected Servico $model) {}

    protected function getModel(): mixed
    {
        return $this->model->newInstance();
    }
}
