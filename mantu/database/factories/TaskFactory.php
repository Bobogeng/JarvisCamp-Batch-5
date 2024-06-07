<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'deadline' => fake()->dateTime(),
            'status' => fake()->randomElement(['Belum Selesai', 'Selesai']),
            'description' => fake()->paragraph(),
            'category_id' => Category::factory(),
        ];
    }
}
