<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $companies = [
            'Tech Solutions', 'Digital Agency', 'Creative Studio', 'Business Consultancy',
            'Marketing Pro', 'Design House', 'Software Corp', 'Innovation Lab',
            'Growth Partners', 'Strategic Solutions', 'Creative Minds', 'Tech Hub',
            'Digital Works', 'Business Solutions', 'Creative Agency', 'Tech Innovations'
        ];

        $statuses = ['active', 'inactive', 'pending'];

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'company' => fake()->randomElement($companies),
            'status' => fake()->randomElement($statuses),
            'notes' => fake()->optional(0.7)->paragraph(),
            'user_id' => User::factory(),
        ];
    }

    /**
     * Indicate that the client is active.
     */
    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'active',
        ]);
    }

    /**
     * Indicate that the client is inactive.
     */
    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'inactive',
        ]);
    }

    /**
     * Indicate that the client is pending.
     */
    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'pending',
        ]);
    }
}