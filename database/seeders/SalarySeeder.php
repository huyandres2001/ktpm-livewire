<?php

namespace Database\Seeders;

use App\Models\Salary;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('salaries')->truncate();
        Salary::factory()->count(10)->create();
    }
}
