<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // ESPECIE (1-5)
            ['name' => 'especie.index'],
            ['name' => 'especie.create'],
            ['name' => 'especie.show'],
            ['name' => 'especie.edit'],
            ['name' => 'especie.delete'],
            // RACA (6-10)
            ['name' => 'raca.index'],
            ['name' => 'raca.create'],
            ['name' => 'raca.show'],
            ['name' => 'raca.edit'],
            ['name' => 'raca.delete'],
            // CLIENTE (11-15)
            ['name' => 'cliente.index'],
            ['name' => 'cliente.create'],
            ['name' => 'cliente.show'],
            ['name' => 'cliente.edit'],
            ['name' => 'cliente.delete'],
            // PET (16-20)
            ['name' => 'pet.index'],
            ['name' => 'pet.create'],
            ['name' => 'pet.show'],
            ['name' => 'pet.edit'],
            ['name' => 'pet.delete'],
            // SERVICO (21-25)
            ['name' => 'servico.index'],
            ['name' => 'servico.create'],
            ['name' => 'servico.show'],
            ['name' => 'servico.edit'],
            ['name' => 'servico.delete'],
            // AGENDAMENTO (26-30)
            ['name' => 'agendamento.index'],
            ['name' => 'agendamento.create'],
            ['name' => 'agendamento.show'],
            ['name' => 'agendamento.edit'],
            ['name' => 'agendamento.delete'],
        ];
        DB::table('resources')->insert($data);
    }
}
