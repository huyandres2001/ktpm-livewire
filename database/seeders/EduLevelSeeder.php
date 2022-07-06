<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EduLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('edu_levels')->truncate();
        DB::table('edu_levels')->insert([
            [
                'name' => 'Learn',
                'major' => 'Accounting',
                'certificate' => 'Bachelor',
            ],
            [
                'name' => 'Learn',
                'major' => 'Biomedical Engineering',
                'certificate' => 'Master',
            ],
            [
                'name' => 'Learn',
                'major' => 'Chemical Engineering',
                'certificate' => 'Post Doctor',
            ],
            [
                'name' => 'Learn',
                'major' => 'Control Engineering and Automation',
                'certificate' => 'Engineering',
            ],
            [
                'name' => 'Learn',
                'major' => 'Marketing',
                'certificate' => 'Bachelor',
            ],
            [
                'name' => 'Learn',
                'major' => 'Mechanics',
                'certificate' => 'Bachelor',
            ],
            [
                'name' => 'Learn',
                'major' => 'Telecommunication',
                'certificate' => 'Bachelor',
            ],
        ]);
    }
}
