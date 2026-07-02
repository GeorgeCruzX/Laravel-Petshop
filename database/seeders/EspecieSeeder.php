<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspecieSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nome' => 'Cão', 'descricao' => 'Canis lupus familiaris'],
            ['nome' => 'Gato', 'descricao' => 'Felis catus'],
            ['nome' => 'Coelho', 'descricao' => 'Oryctolagus cuniculus'],
            ['nome' => 'Pássaro', 'descricao' => 'Aves'],
        ];
        DB::table('especies')->insert($data);
    }
}
