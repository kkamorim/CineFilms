<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [];
        // Usamos now() fora do loop para ter um timestamp de referência.
        $date = now();

        // 1. O Admin Principal
        $users[] = [
            'name' => 'Admin Mestre',
            'email' => 'admin@cinefilms.com',
            'profile_image' => null,
            // Senha: '12345678'
            'password' => Hash::make('12345678'), 
            'is_gm' => 1, // Gerente
            'created_at' => $date,
            'updated_at' => $date,
        ];

        // 2. Um Coordenador (is_gm = 1)
        $users[] = [
            'name' => 'Coordenador Maria',
            'email' => 'maria.coord@cinefilms.com',
            'profile_image' => null,
            // Senha: '123456'
            'password' => Hash::make('123456'), 
            'is_gm' => 1,
            'created_at' => $date->copy()->subHours(1),
            'updated_at' => $date->copy()->subHours(1),
        ];
        
        // 3. 498 Usuários Comuns (is_gm = 0)
        // O loop agora vai até 498 para totalizar 500 usuários.
        for ($i = 1; $i <= 498; $i++) {
            $users[] = [
                'name' => 'Usuario Teste ' . $i,
                'email' => 'teste' . $i . '@usuario.com',
                'profile_image' => null,
                // Senha: '12345678'
                'password' => Hash::make('12345678'), 
                'is_gm' => 0, // Usuário Normal
                'created_at' => $date->copy()->subDays(rand(1, 365)), 
                'updated_at' => $date->copy()->subDays(rand(1, 365)),
            ];
        }

        DB::table('users')->insert($users);
    }
}
