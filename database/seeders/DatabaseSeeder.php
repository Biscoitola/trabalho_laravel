<?php

namespace Database\Seeders;

use App\Models\Prioridade;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password'),
            ],
        );

        foreach (['Baixa', 'Media', 'Alta'] as $nome) {
            Prioridade::firstOrCreate(['nome' => $nome]);
        }

        foreach (['Pendente', 'Concluido'] as $nome) {
            Status::firstOrCreate(['nome' => $nome]);
        }
    }
}
