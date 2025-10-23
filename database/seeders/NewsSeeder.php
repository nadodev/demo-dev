<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\User;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the first user or create one
        $user = User::first();
        if (!$user) {
            $user = User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'role' => 'admin',
                'is_active' => true,
            ]);
        }

        $news = [
            [
                'title' => 'Nova Versão do Sistema Lançada',
                'excerpt' => 'Apresentamos a versão 2.0 do nosso sistema com novas funcionalidades e melhorias.',
                'content' => 'Estamos muito animados em anunciar o lançamento da versão 2.0 do nosso sistema de gestão. Esta nova versão traz diversas melhorias significativas, incluindo uma interface mais intuitiva, novas funcionalidades de relatórios e melhor performance geral.',
                'status' => 'published',
                'published_at' => now()->subDays(1),
            ],
            [
                'title' => 'Tendências em Tecnologia para 2024',
                'excerpt' => 'Descubra as principais tendências tecnológicas que vão moldar o futuro dos negócios.',
                'content' => 'O ano de 2024 promete ser revolucionário em termos de tecnologia. Inteligência Artificial, Internet das Coisas e Computação em Nuvem continuam sendo os pilares fundamentais para a transformação digital das empresas.',
                'status' => 'published',
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'Como Otimizar Seus Processos de Negócio',
                'excerpt' => 'Dicas práticas para melhorar a eficiência e produtividade da sua empresa.',
                'content' => 'A otimização de processos é fundamental para o sucesso de qualquer negócio. Neste artigo, compartilhamos estratégias comprovadas para identificar gargalos, automatizar tarefas repetitivas e aumentar a produtividade da sua equipe.',
                'status' => 'published',
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Inovação em Gestão de Projetos',
                'excerpt' => 'Novas metodologias e ferramentas para gerenciar projetos com mais eficiência.',
                'content' => 'A gestão de projetos evoluiu significativamente nos últimos anos. Metodologias ágeis, ferramentas colaborativas e inteligência artificial estão revolucionando a forma como gerenciamos e executamos projetos.',
                'status' => 'published',
                'published_at' => now()->subDays(7),
            ],
            [
                'title' => 'Segurança Digital: Proteja Seus Dados',
                'excerpt' => 'Importantes dicas de segurança para proteger informações sensíveis da sua empresa.',
                'content' => 'A segurança digital nunca foi tão importante. Com o aumento de ataques cibernéticos, é fundamental que empresas de todos os tamanhos implementem medidas robustas de proteção de dados.',
                'status' => 'published',
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Futuro do Trabalho Remoto',
                'excerpt' => 'Como o trabalho remoto está transformando o mercado e as empresas.',
                'content' => 'O trabalho remoto se tornou uma realidade permanente para muitas empresas. Esta transformação trouxe novos desafios e oportunidades, exigindo adaptação tanto de empregadores quanto de funcionários.',
                'status' => 'published',
                'published_at' => now()->subDays(14),
            ],
        ];

        foreach ($news as $item) {
            News::create($item);
        }
    }
}
