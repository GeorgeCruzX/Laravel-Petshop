<?php

namespace App\Repositories;

use App\Models\Pet;

class PetRepository extends BaseRepository
{
    public function __construct(protected Pet $model) {}

    protected function getModel(): mixed
    {
        return $this->model->newInstance();
    }
}
