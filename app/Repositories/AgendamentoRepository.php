<?php

namespace App\Repositories;

use App\Models\Agendamento;

class AgendamentoRepository extends BaseRepository
{
    public function __construct(protected Agendamento $model) {}

    protected function getModel(): mixed
    {
        return $this->model->newInstance();
    }
}
