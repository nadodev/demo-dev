<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\User;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::where('role', 'admin')->get();

        if ($users->isEmpty()) {
            $this->command->warn('Nenhum usuário encontrado. Execute o UserSeeder primeiro.');
            return;
        }

        $clients = [
            [
                'name' => 'TechCorp Solutions',
                'email' => 'contato@techcorp.com',
                'phone' => '(11) 99999-1111',
                'company' => 'TechCorp Solutions Ltda',
                'status' => 'active',
                'notes' => 'Cliente premium com alto volume de pedidos',
            ],
            [
                'name' => 'Maria Fernanda',
                'email' => 'maria.fernanda@email.com',
                'phone' => '(21) 98888-2222',
                'company' => 'Design Studio',
                'status' => 'active',
                'notes' => 'Designer freelancer, trabalha com projetos criativos',
            ],
            [
                'name' => 'João Pedro',
                'email' => 'joao.pedro@empresa.com',
                'phone' => '(31) 97777-3333',
                'company' => 'Consultoria Empresarial',
                'status' => 'active',
                'notes' => 'Consultor sênior, interessado em soluções corporativas',
            ],
            [
                'name' => 'Ana Beatriz',
                'email' => 'ana.beatriz@startup.com',
                'phone' => '(41) 96666-4444',
                'company' => 'StartupTech',
                'status' => 'pending',
                'notes' => 'Startup em fase inicial, avaliando soluções',
            ],
            [
                'name' => 'Carlos Eduardo',
                'email' => 'carlos.eduardo@loja.com',
                'phone' => '(51) 95555-5555',
                'company' => 'Loja Virtual Plus',
                'status' => 'active',
                'notes' => 'E-commerce com foco em vendas online',
            ],
            [
                'name' => 'Fernanda Lima',
                'email' => 'fernanda.lima@agencia.com',
                'phone' => '(61) 94444-6666',
                'company' => 'Agência Digital',
                'status' => 'active',
                'notes' => 'Agência de marketing digital, múltiplos clientes',
            ],
            [
                'name' => 'Roberto Silva',
                'email' => 'roberto.silva@consultoria.com',
                'phone' => '(71) 93333-7777',
                'company' => 'Silva Consultoria',
                'status' => 'inactive',
                'notes' => 'Cliente inativo há 3 meses, possível reativação',
            ],
            [
                'name' => 'Juliana Martins',
                'email' => 'juliana.martins@estudio.com',
                'phone' => '(81) 92222-8888',
                'company' => 'Estúdio Criativo',
                'status' => 'active',
                'notes' => 'Estúdio de design, projetos gráficos e web',
            ],
            [
                'name' => 'Marcos Antonio',
                'email' => 'marcos.antonio@tech.com',
                'phone' => '(85) 91111-9999',
                'company' => 'Tech Solutions',
                'status' => 'active',
                'notes' => 'Empresa de tecnologia, desenvolvimento de software',
            ],
            [
                'name' => 'Patricia Souza',
                'email' => 'patricia.souza@educacao.com',
                'phone' => '(95) 90000-0000',
                'company' => 'Instituto Educacional',
                'status' => 'pending',
                'notes' => 'Instituição educacional, interessada em plataforma de gestão',
            ],
        ];

        foreach ($clients as $clientData) {
            $clientData['user_id'] = $users->random()->id;
            Client::create($clientData);
        }

        // Criar clientes adicionais usando factory (se disponível)
        Client::factory(15)->create([
            'user_id' => $users->random()->id,
        ]);
    }
}