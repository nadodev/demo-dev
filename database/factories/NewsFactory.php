<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statuses = ['draft', 'published', 'archived'];
        $categories = ['tecnologia', 'negocios', 'inovacao', 'tendencias', 'geral'];
        
        $title = fake()->sentence(4);
        
        return [
            'title' => $title,
            'slug' => \Illuminate\Support\Str::slug($title),
            'content' => fake()->paragraphs(5, true),
            'excerpt' => fake()->paragraph(),
            'category' => fake()->randomElement($categories),
            'featured_image' => null,
            'status' => fake()->randomElement($statuses),
            'published_at' => fake()->optional(0.7)->dateTimeBetween('-1 year', 'now'),
            'meta_title' => fake()->sentence(3),
            'meta_description' => fake()->paragraph(),
        ];
    }

    /**
     * Indicate that the news is published.
     */
    public function published(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'published',
            'published_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ]);
    }

    /**
     * Indicate that the news is draft.
     */
    public function draft(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'draft',
            'published_at' => null,
        ]);
    }

    /**
     * Indicate that the news is archived.
     */
    public function archived(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'archived',
            'published_at' => fake()->dateTimeBetween('-2 years', '-6 months'),
        ]);
    }
}
