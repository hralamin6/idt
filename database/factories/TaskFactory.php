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
    public function definition()
    {
        return [
            'name' => $this->faker->word(2),
            'name_bn' => $this->faker->word(3),
            'description' => $this->faker->sentence(10),
            'description_bn' => $this->faker->sentence(12),
        ];
    }
}
