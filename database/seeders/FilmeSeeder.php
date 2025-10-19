<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmeSeeder extends Seeder
{
    public function run()
    {
        $filmes = [];
        $generos = ['Ação', 'Comédia', 'Terror', 'Drama', 'Ficção Científica', 'Documentário', 'Ação/Corrida'];
        $classificacoes = [10, 12, 14, 16, 18];
        $date = now();

        // 1. Filmes de Ação/Corrida (9 Filmes)
        for ($i = 1; $i <= 9; $i++) {
            // Garante que array_rand receba apenas chaves válidas.
            $classificacao_key = [0, 1, 2][array_rand([0, 1, 2])]; 
            $filmes[] = [
                'titulo' => 'Turbo Rush ' . $i,
                'genero' => 'Ação/Corrida',
                'imagem' => 'posters/turbo_rush_' . $i . '.jpg',
                'descricao' => 'Um filme de tirar o fôlego sobre corridas ilegais e alta velocidade.',
                'classificacao' => $classificacoes[$classificacao_key], // PG-10, 12 ou 14
                'created_at' => $date->copy()->subMonths(rand(1, 24)),
                'updated_at' => $date->copy()->subMonths(rand(1, 24)),
            ];
        }
        
        // 2. 50 Filmes variados
        for ($i = 1; $i <= 50; $i++) {
            $genero = $generos[array_rand($generos)];
            $classificacao_key = array_rand($classificacoes);

            // Ajustar classificação para Terror/Drama (mais alta)
            if ($genero === 'Terror' || $genero === 'Drama') {
                $classificacao_key = array_rand([3, 4]); // 16 ou 18
            }

            $filmes[] = [
                'titulo' => 'Filme Fantasia ' . $i,
                'genero' => $genero,
                'imagem' => 'posters/fantasia_' . $i . '.jpg',
                'descricao' => "Descrição detalhada do filme de {$genero} com classificação PG-{$classificacoes[$classificacao_key]}.",
                'classificacao' => $classificacoes[$classificacao_key],
                'created_at' => $date->copy()->subMonths(rand(1, 36)),
                'updated_at' => $date->copy()->subMonths(rand(1, 36)),
            ];
        }

        DB::table('filmes')->insert($filmes);
    }
}
