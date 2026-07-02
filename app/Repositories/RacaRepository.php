<?php

namespace App\Repositories;

use App\Models\Raca;

class RacaRepository extends BaseRepository
{
    public function __construct(protected Raca $model) {}

    protected function getModel(): mixed
    {
        return $this->model->newInstance();
    }
}
