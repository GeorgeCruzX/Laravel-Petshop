<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name' => 'Atendente'],
            ['name' => 'Gerente'],
        ];
        DB::table('roles')->insert($data);
    }
}
