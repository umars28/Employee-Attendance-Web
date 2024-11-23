<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            [
                'name' => 'Rendra',
                'birth_of_date' => '2012-12-12',
                'city' => 'Jakarta',
                'user_id' => DB::table('users')->where('email', 'rendragituloh@gmail.com')->value('id'),
            ],
            [
                'name' => 'Khariz',
                'birth_of_date' => '2012-12-12',
                'city' => 'Surabaya',
                'user_id' => DB::table('users')->where('email', 'Kharizajaah@gmail.com')->value('id'),
            ],
            [
                'name' => 'Joko',
                'birth_of_date' => '2012-12-12',
                'city' => 'Bandung',
                'user_id' => DB::table('users')->where('email', 'Jokoterdepan@gmail.com')->value('id'),
            ],
            [
                'name' => 'Mariyam',
                'birth_of_date' => '2012-12-12',
                'city' => 'Yogyakarta',
                'user_id' => DB::table('users')->where('email', 'Maiyamyuk@gmail.com')->value('id'),
            ],
        ]);
    }
}
