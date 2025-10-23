<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['consultoria', 'desenvolvimento', 'design', 'marketing', 'suporte'];
        $statuses = ['active', 'inactive', 'draft'];
        $priceTypes = ['fixed', 'hourly', 'custom'];
        
        $features = [
            ['Responsivo', 'SEO Otimizado', 'Suporte 24/7'],
            ['Análise Completa', 'Relatórios Detalhados', 'Implementação'],
            ['Logo Design', 'Manual de Marca', 'Materiais Gráficos'],
            ['SEO', 'Redes Sociais', 'Google Ads'],
            ['Suporte 24/7', 'Manutenção Preventiva', 'Atualizações']
        ];

        $name = fake()->words(2, true) . ' ' . fake()->randomElement(['Service', 'Solution', 'Consulting', 'Development']);
        
        return [
            'name' => $name,
            'slug' => \Illuminate\Support\Str::slug($name),
            'description' => fake()->paragraph(),
            'short_description' => fake()->sentence(),
            'price' => fake()->randomFloat(2, 50.00, 5000.00),
            'price_type' => fake()->randomElement($priceTypes),
            'category' => fake()->randomElement($categories),
            'duration' => fake()->randomElement(['1 semana', '2 semanas', '1 mês', '2 meses', '3 meses']),
            'featured_image' => null,
            'features' => fake()->randomElement($features),
            'status' => fake()->randomElement($statuses),
            'sort_order' => fake()->numberBetween(0, 100),
            'meta_title' => fake()->sentence(3),
            'meta_description' => fake()->paragraph(),
        ];
    }

    /**
     * Indicate that the service is active.
     */
    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'active',
        ]);
    }

    /**
     * Indicate that the service is inactive.
     */
    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'inactive',
        ]);
    }

    /**
     * Indicate that the service is draft.
     */
    public function draft(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'draft',
        ]);
    }
}
