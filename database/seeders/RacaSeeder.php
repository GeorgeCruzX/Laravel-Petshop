<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RacaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nome' => 'Labrador', 'especie_id' => 1],
            ['nome' => 'Golden Retriever', 'especie_id' => 1],
            ['nome' => 'Bulldog Francês', 'especie_id' => 1],
            ['nome' => 'Poodle', 'especie_id' => 1],
            ['nome' => 'Shih Tzu', 'especie_id' => 1],
            ['nome' => 'Persa', 'especie_id' => 2],
            ['nome' => 'Siamês', 'especie_id' => 2],
            ['nome' => 'Maine Coon', 'especie_id' => 2],
            ['nome' => 'Angorá', 'especie_id' => 3],
            ['nome' => 'Canário', 'especie_id' => 4],
        ];
        DB::table('racas')->insert($data);
    }
}
