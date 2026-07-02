<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicoSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nome' => 'Banho', 'descricao' => 'Banho completo com secagem', 'preco' => 50.00, 'duracao_minutos' => 60],
            ['nome' => 'Tosa', 'descricao' => 'Tosa higiênica ou estética', 'preco' => 70.00, 'duracao_minutos' => 90],
            ['nome' => 'Banho e Tosa', 'descricao' => 'Banho completo + tosa', 'preco' => 100.00, 'duracao_minutos' => 120],
            ['nome' => 'Consulta Veterinária', 'descricao' => 'Consulta com médico veterinário', 'preco' => 150.00, 'duracao_minutos' => 30],
            ['nome' => 'Vacinação', 'descricao' => 'Aplicação de vacinas', 'preco' => 80.00, 'duracao_minutos' => 15],
        ];
        DB::table('servicos')->insert($data);
    }
}
