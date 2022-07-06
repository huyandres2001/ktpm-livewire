<?php
namespace Database\Seeders;
use App\Models\Position;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('positions')->truncate();
        // DB::table('positions')->insert([
        //     [
        //         'name' => 'Director',
        //         'description' => 'asadsdas',
        //     ],
        //     [
        //         'name' => 'Deputy',
        //         'description' => 'dasaddas',
        //     ],
        //     [
        //         'name' =>'Chief Executive Officer',
        //         'description' => 'addassad',
        //     ],
        //     [
        //         'name' =>'Chief Information Officer ',
        //         'description' => '',
        //     ],
        //     [
        //         'name' =>'Chief Operating Officer',
        //         'description' => '',
        //     ],
        //     [
        //         'name' =>'Chief Financial Officer',
        //         'description' => '',
        //     ],
        //     [
        //         'name' =>'Board of Directors',
        //         'description' => '',
        //     ],
        //     [
        //         'name' =>'Share holder',
        //         'description' => '',
        //     ],
        //     [
        //         'name' =>'Executive',
        //         'description' => '',
        //     ],
        //     [
        //         'name' =>'Founder',
        //         'description' => '',
        //     ],
        //     [
        //         'name' =>'Employee',
        //         'description' => '',
        //     ],
        // ]);

        Position::factory()->count(10)->create();
    }
}
