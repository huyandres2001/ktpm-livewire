<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

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
            //JobSeeder::class,
            //JobEvaluationSeeder::class,
            //PositionSeeder::class,
            //SalarySeeder::class,
            UserSeeder::class,
            RolePermissionSeeder::class,
        ]);

        Schema::enableForeignKeyConstraints();
//        $this->call([
//            RolePermissionSeeder::class,
//        ]);
    }
}
