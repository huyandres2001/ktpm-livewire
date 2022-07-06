<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Salary;
use App\Models\EduLevel;
use App\Models\Position;
use App\Models\Department;
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
            'name' => 'Admin',
            'gender' => 'male',
            'birthday' => '2001-12-28',
            'phone' => '0886152192',
            'email' => 'admin@gmail.com',
            'identity_card' => '31231321321',
            'location' => 'VN',
            'department_id' => 1,
            'email_verified_at' => now(),
            'edu_level_id' => 1,
            'salary_id' => 1,
            'position_id' => 1,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);



        User::factory()->count(100)->create();
    }
}
