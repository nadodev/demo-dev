<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['software', 'serviço', 'produto físico', 'curso', 'consultoria'];
        $statuses = ['active', 'inactive', 'draft'];
        
        $features = [
            ['CRM', 'Vendas', 'Relatórios'],
            ['Design Responsivo', 'SEO', 'Analytics'],
            ['Mobile', 'Web', 'API'],
            ['Dashboard', 'Notificações', 'Integração'],
            ['Pagamentos', 'Estoque', 'Clientes'],
            ['Marketing', 'Vendas', 'Suporte'],
            ['Treinamento', 'Certificado', 'Projetos'],
            ['Consultoria', 'Estratégia', 'Implementação']
        ];

        return [
            'name' => fake()->words(3, true),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 29.90, 999.90),
            'status' => fake()->randomElement($statuses),
            'category' => fake()->randomElement($categories),
            'image' => null,
            'features' => fake()->randomElement($features),
            'user_id' => User::factory(),
            'client_id' => null,
        ];
    }

    /**
     * Indicate that the product is active.
     */
    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'active',
        ]);
    }

    /**
     * Indicate that the product is inactive.
     */
    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'inactive',
        ]);
    }

    /**
     * Indicate that the product is draft.
     */
    public function draft(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'draft',
        ]);
    }

    /**
     * Indicate that the product belongs to a client.
     */
    public function withClient(): static
    {
        return $this->state(fn (array $attributes) => [
            'client_id' => Client::factory(),
        ]);
    }
}