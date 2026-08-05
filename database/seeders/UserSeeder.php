<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // 1. Administrador Principal
        User::updateOrCreate(
            ['email' => 'admin@cinefilms.com'],
            [
                'name' => 'Admin Mestre',
                'password' => Hash::make('12345678'),
                'is_gm' => 1,
                'role' => 'admin',
                'cpf' => '111.222.333-44',
                'telefone' => '(11) 98888-7777',
            ]
        );

        // 2. Coordenador
        User::updateOrCreate(
            ['email' => 'coordenador@cinefilms.com'],
            [
                'name' => 'Coordenador Maria',
                'password' => Hash::make('12345678'),
                'is_gm' => 1,
                'role' => 'coordenador',
                'cpf' => '222.333.444-55',
                'telefone' => '(11) 97777-6666',
            ]
        );

        // 3. Usuário Comum Principal
        User::updateOrCreate(
            ['email' => 'user@cinefilms.com'],
            [
                'name' => 'Usuário Cliente',
                'password' => Hash::make('12345678'),
                'is_gm' => 0,
                'role' => 'user',
                'cpf' => '333.444.555-66',
                'telefone' => '(11) 96666-5555',
            ]
        );
        
        // 4. Usuário Teste Legado
        User::updateOrCreate(
            ['email' => 'usuario@teste.com'],
            [
                'name' => 'Usuário Teste',
                'password' => Hash::make('12345678'),
                'is_gm' => 0,
                'role' => 'user',
            ]
        );

        // 5. Admin GM Legado
        User::updateOrCreate(
            ['email' => 'admin@teste.com'],
            [
                'name' => 'Admin GM',
                'password' => Hash::make('12345678'),
                'is_gm' => 1,
                'role' => 'admin',
            ]
        );
    }
}
