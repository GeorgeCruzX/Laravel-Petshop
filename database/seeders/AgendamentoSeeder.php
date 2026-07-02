<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgendamentoSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['pet_id' => 1, 'servico_id' => 3, 'data_hora' => '2026-06-25 09:00:00', 'status' => 'confirmado', 'observacoes' => null],
            ['pet_id' => 2, 'servico_id' => 1, 'data_hora' => '2026-06-25 11:00:00', 'status' => 'pendente', 'observacoes' => 'Pet nervoso'],
            ['pet_id' => 3, 'servico_id' => 4, 'data_hora' => '2026-06-26 14:00:00', 'status' => 'pendente', 'observacoes' => null],
            ['pet_id' => 4, 'servico_id' => 2, 'data_hora' => '2026-06-22 10:00:00', 'status' => 'concluido', 'observacoes' => 'Tosa padrão Golden'],
        ];
        DB::table('agendamentos')->insert($data);
    }
}
