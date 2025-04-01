<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Skin>
 */
class SkinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'img_url' => fake()->imageUrl(800, 600, 'animals', true),
            'status' => fake()->randomElement(['1', '0'])
        ];
    }
}
