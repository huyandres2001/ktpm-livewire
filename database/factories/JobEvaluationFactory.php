<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobEvaluation>
 */
class JobEvaluationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $job_id = Job::pluck('id')->toArray();
        return [
            'progress' => $this->faker->randomNumber(2, true) . '%',
            'status' => $this->faker->paragraph(1),
            'kpi'=> $this->faker->paragraph(1),
            'job_id' => $this->faker->randomElement($job_id),
        ];
    }
}
