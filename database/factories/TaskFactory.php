<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\task>
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
            //how every single feild of every record should look like
            'title' => fake()->sentence(),
            'description'=> fake()->paragraph(),
            'long_description'=>fake()->paragraph(7, true),
            'completed'=>fake()->boolean
        ];
    }
}
