<?php

namespace Database\Factories;

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
            "title" => fake()->sentence(8 , true),
            "description" => fake()->paragraph,
            "long_description" => fake()->paragraph(5, true), 
            "completed" => fake()->boolean,
        ];
    }

    public function nulllongdesc(): static
    {
        return $this->state(fn (array $attributes) => [
            'long_description' => null,
        ]);
    }
}
