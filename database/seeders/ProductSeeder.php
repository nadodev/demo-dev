<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;
use App\Models\Client;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::where('role', 'admin')->get();
        $clients = Client::where('status', 'active')->get();

        if ($users->isEmpty()) {
            $this->command->warn('Nenhum usuário encontrado. Execute o UserSeeder primeiro.');
            return;
        }

        $products = [
            [
                'name' => 'Sistema de Gestão Empresarial',
                'description' => 'Plataforma completa para gestão de empresas, incluindo CRM, vendas, estoque e relatórios.',
                'price' => 299.90,
                'status' => 'active',
                'category' => 'software',
                'features' => ['CRM', 'Vendas', 'Estoque', 'Relatórios', 'Dashboard'],
            ],
            [
                'name' => 'E-commerce Personalizado',
                'description' => 'Loja virtual completa com design personalizado, pagamentos integrados e gestão de produtos.',
                'price' => 199.90,
                'status' => 'active',
                'category' => 'software',
                'features' => ['Design Responsivo', 'Pagamentos', 'Gestão de Produtos', 'SEO'],
            ],
            [
                'name' => 'Consultoria em Marketing Digital',
                'description' => 'Serviço de consultoria especializada em estratégias de marketing digital e redes sociais.',
                'price' => 150.00,
                'status' => 'active',
                'category' => 'serviço',
                'features' => ['Estratégia', 'Redes Sociais', 'SEO', 'Analytics'],
            ],
            [
                'name' => 'Curso de Desenvolvimento Web',
                'description' => 'Curso completo de desenvolvimento web com HTML, CSS, JavaScript e frameworks modernos.',
                'price' => 89.90,
                'status' => 'active',
                'category' => 'curso',
                'features' => ['HTML/CSS', 'JavaScript', 'React', 'Node.js', 'Certificado'],
            ],
            [
                'name' => 'App Mobile para Delivery',
                'description' => 'Aplicativo mobile para delivery com integração de pagamentos e gestão de pedidos.',
                'price' => 399.90,
                'status' => 'active',
                'category' => 'software',
                'features' => ['iOS', 'Android', 'Pagamentos', 'GPS', 'Notificações'],
            ],
            [
                'name' => 'Consultoria em Transformação Digital',
                'description' => 'Consultoria especializada em transformação digital para empresas tradicionais.',
                'price' => 250.00,
                'status' => 'active',
                'category' => 'consultoria',
                'features' => ['Análise', 'Estratégia', 'Implementação', 'Treinamento'],
            ],
            [
                'name' => 'Sistema de Controle de Estoque',
                'description' => 'Sistema completo para controle de estoque com códigos de barras e relatórios.',
                'price' => 129.90,
                'status' => 'active',
                'category' => 'software',
                'features' => ['Código de Barras', 'Relatórios', 'Alertas', 'Integração'],
            ],
            [
                'name' => 'Curso de Design Gráfico',
                'description' => 'Curso completo de design gráfico com Photoshop, Illustrator e InDesign.',
                'price' => 79.90,
                'status' => 'active',
                'category' => 'curso',
                'features' => ['Photoshop', 'Illustrator', 'InDesign', 'Projetos Práticos'],
            ],
            [
                'name' => 'Website Institucional',
                'description' => 'Website institucional responsivo com sistema de gestão de conteúdo.',
                'price' => 99.90,
                'status' => 'active',
                'category' => 'produto físico',
                'features' => ['Design Responsivo', 'CMS', 'SEO', 'Formulários'],
            ],
            [
                'name' => 'Consultoria em SEO',
                'description' => 'Serviço de consultoria em SEO para melhorar o posicionamento nos buscadores.',
                'price' => 120.00,
                'status' => 'active',
                'category' => 'consultoria',
                'features' => ['Análise', 'Otimização', 'Relatórios', 'Acompanhamento'],
            ],
            [
                'name' => 'Sistema de Agendamento',
                'description' => 'Sistema completo para agendamento de consultas e serviços.',
                'price' => 89.90,
                'status' => 'draft',
                'category' => 'software',
                'features' => ['Calendário', 'Notificações', 'Pagamentos', 'Relatórios'],
            ],
            [
                'name' => 'Curso de Marketing Digital',
                'description' => 'Curso completo de marketing digital com estratégias práticas e cases reais.',
                'price' => 149.90,
                'status' => 'active',
                'category' => 'curso',
                'features' => ['Estratégias', 'Cases', 'Ferramentas', 'Certificado'],
            ],
        ];

        foreach ($products as $productData) {
            $productData['user_id'] = $users->random()->id;
            
            // Associar alguns produtos a clientes
            if ($clients->isNotEmpty() && rand(0, 1)) {
                $productData['client_id'] = $clients->random()->id;
            }
            
            Product::create($productData);
        }

        // Criar produtos adicionais usando factory (se disponível)
        Product::factory(20)->create([
            'user_id' => $users->random()->id,
            'client_id' => $clients->isNotEmpty() ? $clients->random()->id : null,
        ]);
    }
}