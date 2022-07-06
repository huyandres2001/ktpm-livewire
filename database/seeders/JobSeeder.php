<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\JobEvaluation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('jobs')->truncate();
        Job::factory()->count(10)->has(JobEvaluation::factory()->count(rand(1,10)), 'job_evaluations')->create();
    }
}
