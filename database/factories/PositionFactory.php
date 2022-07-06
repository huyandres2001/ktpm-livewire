<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Position>
 */
class PositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'Director',
                'Deputy',
                'Chief Executive Officer',
                'Chief Information Officer ',
                'Chief Operating Officer',
                'Chief Financial Officer',
                'Board of Directors',
                'Share holder',
                'Executive',
                'Founder'
            ]),
            'description' => $this->faker->text(),
        ];
    }
}
