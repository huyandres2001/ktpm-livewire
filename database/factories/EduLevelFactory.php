<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EduLevel>
 */
class EduLevelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'major' => $this->faker->paragraph(1),
            'description' => $this->faker->paragraph(1),
            'certificate' => $this->faker->paragraph(1),
        ];
    }
}
