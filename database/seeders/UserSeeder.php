<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'CARLOS ALBERTO SOUZA',
                'email' => 'atendente@petshop.com',
                'password' => Hash::make('@1234@5678'),
                'role_id' => 1,
            ],
            [
                'name' => 'FERNANDA LIMA',
                'email' => 'gerente@petshop.com',
                'password' => Hash::make('@1234@5678'),
                'role_id' => 2,
            ],
        ];
        DB::table('users')->insert($data);
    }
}
