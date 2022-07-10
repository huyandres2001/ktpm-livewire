<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\User;
use App\Models\Salary;
use App\Models\Position;
use App\Models\Department;
use App\Models\JobEvaluation;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'gender' => 'male',
                'birthday' => '2001-12-28',
                'phone' => '0886152192',
                'email' => 'huy.nv28122001@gmail.com',
                'identity_card' => '31231321321',
                'location' => 'VN',
                'major' => 'IT',
                'certificate' => 'Professor',
                'department_id' => 1,
                'email_verified_at' => now(),
                'salary_id' => 1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Employee',
                'gender' => 'male',
                'birthday' => '2001-12-28',
                'phone' => '08861521921',
                'email' => 'huyandres2001@gmail.com',
                'identity_card' => '3123132132321',
                'location' => 'VN',
                'major' => 'IT',
                'certificate' => 'Professor',
                'department_id' => 1,
                'email_verified_at' => now(),
                'salary_id' => 1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Leader',
                'gender' => 'male',
                'birthday' => '2001-12-28',
                'phone' => '0886152192213',
                'email' => 'huy.nv192914@sis.hust.edu.vn',
                'identity_card' => '312313213213123',
                'location' => 'VN',
                'major' => 'IT',
                'certificate' => 'Professor',
                'department_id' => 1,
                'email_verified_at' => now(),
                'salary_id' => 1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ],
        ]);

        //delete all records from the following tables
        DB::table('jobs')->truncate();
        DB::table('positions')->truncate();
        DB::table('employee_job')->truncate();
        DB::table('employee_position')->truncate();
        DB::table('job_evaluations')->truncate();
        //this seeder seeds user and all related many to many relationships with 'users' table
        //in this case, the table that have many to many relationships with 'users' table is 'jobs' pivot: 'employee_job'
        //same with 'employee_position' table
        User::factory()->count(20)->create();
        $users = User::all(); // include Admin above
        $positions = Position::factory()->count(10)->create();
        $jobs = Job::factory()->count(10)
            ->has(JobEvaluation::factory()->count(rand(1, 10)), 'job_evaluations') //factory one to many relationships
            ->create();
        $users->each(function (User $user) use ($positions, $jobs) {
            $user->positions()
                ->attach( //inserting a record in the relationship's intermediate table:
                    //details in https://laravel.com/docs/9.x/eloquent-relationships#updating-belongs-to-relationships
                    $positions->random(rand(1, 10))->pluck('id')->toArray(),

                );
            $user->jobs()
                ->attach(
                    $jobs->random(rand(1, 10))->pluck('id')->toArray(),
                    [
                        'assigned_day' => now()->addDays(rand(0,10)),
                        'deadline' => now()->addDays(rand(10,20)),
                        'requirements' => 'bsadlkadskj'
                    ]
                );
        });
    }
}
