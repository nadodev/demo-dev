<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\User;

class ServiceSeeder extends Seeder
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

        $services = [
            [
                'name' => 'Desenvolvimento Web',
                'description' => 'Criação de sites e aplicações web modernas e responsivas.',
                'price' => 2500.00,
                'status' => 'active',
                'features' => json_encode(['Responsivo', 'SEO Otimizado', 'Suporte 24/7']),
            ],
            [
                'name' => 'Consultoria em TI',
                'description' => 'Consultoria especializada em tecnologia da informação para sua empresa.',
                'price' => 150.00,
                'status' => 'active',
                'features' => json_encode(['Análise Completa', 'Relatórios Detalhados', 'Implementação']),
            ],
            [
                'name' => 'Design Gráfico',
                'description' => 'Criação de identidade visual, logos e materiais gráficos.',
                'price' => 800.00,
                'status' => 'active',
                'features' => json_encode(['Logo Design', 'Manual de Marca', 'Materiais Gráficos']),
            ],
            [
                'name' => 'Marketing Digital',
                'description' => 'Estratégias de marketing digital para aumentar sua presença online.',
                'price' => 1200.00,
                'status' => 'active',
                'features' => json_encode(['SEO', 'Redes Sociais', 'Google Ads']),
            ],
            [
                'name' => 'Suporte Técnico',
                'description' => 'Suporte técnico especializado para seus sistemas e aplicações.',
                'price' => 80.00,
                'status' => 'active',
                'features' => json_encode(['Suporte 24/7', 'Manutenção Preventiva', 'Atualizações']),
            ],
            [
                'name' => 'Auditoria de Sistemas',
                'description' => 'Análise e auditoria completa dos seus sistemas de informação.',
                'price' => 2000.00,
                'status' => 'active',
                'features' => json_encode(['Análise Completa', 'Relatório Detalhado', 'Recomendações']),
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
