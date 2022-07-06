<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Salary>
 */
class SalaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'basic_salary' => $this->faker->randomDigitNotNull() * 10000000,
            'cofficient' => $this->faker->randomNumber(2,false) / 10,
            'allowance' => $this->faker->randomDigitNotNull() * 1000000,
            'bonus' => $this->faker->randomDigitNotNull() * 1000000,
        ];
    }
}
