<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call(EspecieSeeder::class);
        $this->call(RacaSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(PetSeeder::class);
        $this->call(ServicoSeeder::class);
        $this->call(AgendamentoSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(ResourceSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);
    }
}
