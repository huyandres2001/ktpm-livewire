<?php

namespace Database\Seeders;

use App\Models\JobEvaluation;
use App\Models\User;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Expr\PostDec;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //truncate all the database
        Schema::disableForeignKeyConstraints();
        $this->call([
            DepartmentSeeder::class,
            EduLevelSeeder::class,
            JobSeeder::class,
            JobEvaluationSeeder::class,
            PositionSeeder::class,
            SalarySeeder::class,
            UserSeeder::class,
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
