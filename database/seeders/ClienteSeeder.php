<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nome' => 'ANA PAULA FERREIRA', 'cpf' => '111.222.333-44', 'telefone' => '(41) 98765-4321', 'email' => 'ana@email.com', 'endereco' => 'Rua das Flores, 100'],
            ['nome' => 'ROBERTO COSTA', 'cpf' => '222.333.444-55', 'telefone' => '(41) 91234-5678', 'email' => 'roberto@email.com', 'endereco' => 'Av. Brasil, 200'],
            ['nome' => 'MÁRCIA SANTOS', 'cpf' => '333.444.555-66', 'telefone' => '(41) 99876-5432', 'email' => 'marcia@email.com', 'endereco' => 'Rua XV, 300'],
        ];
        DB::table('clientes')->insert($data);
    }
}
