<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Department;
use App\Models\EduLevel;
use App\Models\Position;
use App\Models\Salary;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        $department_id = Department::pluck('id')->toArray();
        $edu_level_id = EduLevel::pluck('id')->toArray();
        return [
            'name' => $this->faker->name($gender = $this->faker->randomElement(['male', 'female'])),
            'gender' => $gender,
            'birthday' => $this->faker->dateTimeBetween('-60 years', '-18 years'),
            'phone' => $this->faker->unique()->tollFreePhoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'identity_card' => $this->faker->bankAccountNumber(),
            'location' => $this->faker->address(),
            'department_id' => $this->faker->randomElement($department_id),
            'edu_level_id' => $this->faker->randomElement(EduLevel::pluck('id')->toArray()),
            'salary_id' => $this->faker->randomElement(Salary::pluck('id')->toArray()),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
