<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'name' => $this->faker->jobTitle(),
            'description' => $this->faker->paragraph(3),
            'note' => $this->faker->paragraph(3),
            'schedule' => $this->faker->dateTime(),
        ];
    }
}
