<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::table('permissions')->truncate();
        Schema::enableForeignKeyConstraints();
        //create roles
        DB::table('roles')->insert([
            [
                'name' => 'employee',
                'guard_name' => 'web'
            ],
            [
                'name' => 'admin',
                'guard_name' => 'web'
            ],
            [
                'name' => 'leader',
                'guard_name' => 'web'
            ],
        ]);
        //assign roles
        User::find(1)->assignRole('admin');
        User::find(2)->assignRole('employee');
        User::find(3)->assignRole('leader');
        //create permissions
        $functions = ['read', 'create', 'update', 'delete'];
        $entities = ['users', 'departments', 'jobs', 'salaries', 'positions', 'job_reports','employee_reports'];
        foreach ($entities as $entity) {
            foreach ($functions as $function) {
                DB::table('permissions')->insert([
                    'name' => $entity . '.' . $function,
                    'guard_name' => 'web'
                ]);
            }
        }
        DB::table('permissions')->insert([
            [
                'name' => 'jobs.assign',
                'guard_name' => 'web'
            ],
            [
                'name' => 'jobs.evaluate',
                'guard_name' => 'web'
            ],
            [
                'name' => '*.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'jobs.*',
                'guard_name' => 'web'
            ],
            [
                'name' => 'salaries.*',
                'guard_name' => 'web'
            ],
            [
                'name' => 'positions.*',
                'guard_name' => 'web'
            ],
            [
                'name' => 'job_reports.*',
                'guard_name' => 'web'
            ],
            [
                'name' => 'employee_reports.*',
                'guard_name' => 'web'
            ],
        ]);
        //assign permissions to roles
        Role::findByName('leader')
            ->givePermissionTo(['*.read','jobs.*', 'salaries.*', 'positions.*']);
        Role::findByName('employee')
        ->givePermissionTo(['*.read', 'job_reports.*']);
    }
}
