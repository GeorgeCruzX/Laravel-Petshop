<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nome' => 'Thor', 'data_nascimento' => '2021-03-15', 'sexo' => 'M', 'cliente_id' => 1, 'raca_id' => 1],
            ['nome' => 'Bella', 'data_nascimento' => '2020-07-22', 'sexo' => 'F', 'cliente_id' => 1, 'raca_id' => 3],
            ['nome' => 'Mel', 'data_nascimento' => '2022-01-10', 'sexo' => 'F', 'cliente_id' => 2, 'raca_id' => 6],
            ['nome' => 'Rex', 'data_nascimento' => '2019-11-05', 'sexo' => 'M', 'cliente_id' => 3, 'raca_id' => 2],
        ];
        DB::table('pets')->insert($data);
    }
}
