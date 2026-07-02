<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // role_id=1 Atendente: clientes, pets, agendamentos (sem delete)
        $atendente = [
            // CLIENTE
            ['role_id' => 1, 'resource_id' => 11],
            ['role_id' => 1, 'resource_id' => 12],
            ['role_id' => 1, 'resource_id' => 13],
            ['role_id' => 1, 'resource_id' => 14],
            // PET
            ['role_id' => 1, 'resource_id' => 16],
            ['role_id' => 1, 'resource_id' => 17],
            ['role_id' => 1, 'resource_id' => 18],
            ['role_id' => 1, 'resource_id' => 19],
            // AGENDAMENTO
            ['role_id' => 1, 'resource_id' => 26],
            ['role_id' => 1, 'resource_id' => 27],
            ['role_id' => 1, 'resource_id' => 28],
            ['role_id' => 1, 'resource_id' => 29],
            // ESPECIE (só ver)
            ['role_id' => 1, 'resource_id' => 1],
            ['role_id' => 1, 'resource_id' => 3],
            // RACA (só ver)
            ['role_id' => 1, 'resource_id' => 6],
            ['role_id' => 1, 'resource_id' => 8],
            // SERVICO (só ver)
            ['role_id' => 1, 'resource_id' => 21],
            ['role_id' => 1, 'resource_id' => 23],
        ];

        // role_id=2 Gerente: tudo
        $gerente = [];
        for ($i = 1; $i <= 30; $i++) {
            $gerente[] = ['role_id' => 2, 'resource_id' => $i];
        }

        DB::table('permissions')->insert(array_merge($atendente, $gerente));
    }
}
