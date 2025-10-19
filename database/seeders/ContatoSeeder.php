<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContatoSeeder extends Seeder
{
    public function run()
    {
        $contatos = [];
        $nomes = ['Ana', 'Bruno', 'Carlos', 'Diana', 'Eduardo', 'Fernanda', 'Gustavo', 'Helena', 'Isabela', 'João'];
        $mensagens = [
            'O site está lindo! Parabéns.',
            'Sugestão de filme: O Labirinto do Fauno. Adicionem!',
            'Encontrei um bug ao tentar editar meu perfil.',
            'Obrigado pelo rápido suporte, problema resolvido.',
            'Gostaria de saber mais sobre as classificações indicativas.',
            'Onde posso ver o trailer do novo filme de Ação?',
            'O recurso de busca está um pouco lento.',
            'Melhor plataforma de streaming que já usei!',
            'Vocês têm planos para adicionar séries?',
            'Obrigado pelo ótimo conteúdo.',
        ];
        $date = now();

        // Loop até 390
        for ($i = 1; $i <= 390; $i++) {
            $nome_selecionado = $nomes[array_rand($nomes)];

            $contatos[] = [
                'nome' => $nome_selecionado . ' S.',
                'email' => strtolower($nome_selecionado) . $i . '@email.com',
                'mensagem' => $mensagens[array_rand($mensagens)],
                'created_at' => $date->copy()->subHours(rand(1, 720)), // Último mês de mensagens
                'updated_at' => $date->copy()->subHours(rand(1, 720)),
            ];
        }

        // Usamos insert() para inserir todos de uma vez.
        DB::table('contatos')->insert($contatos);
    }
}
