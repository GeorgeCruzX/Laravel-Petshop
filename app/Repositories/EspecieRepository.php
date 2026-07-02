<?php

namespace App\Repositories;

use App\Models\Especie;

class EspecieRepository extends BaseRepository
{
    public function __construct(protected Especie $model) {}

    protected function getModel(): mixed
    {
        return $this->model->newInstance();
    }
}
