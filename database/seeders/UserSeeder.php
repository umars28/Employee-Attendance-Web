<?php

namespace Database\Seeders;

use App\Enums\RoleType;
use App\Enums\StatusType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Rendra',
                'email' => 'rendragituloh@gmail.com',
                'password' => bcrypt('rendragituloh@gmail.com'),
                'status' => StatusType::INACTIVE,
                'role' => RoleType::EMPLOYEE,
                'created_date' => now(),
            ],
            [
                'name' => 'Khariz',
                'email' => 'Kharizajaah@gmail.com',
                'password' => bcrypt('Kharizajaah@gmail.com'),
                'status' => StatusType::ACTIVE,
                'role' => RoleType::EMPLOYEE,
                'created_date' => now(),
            ],
            [
                'name' => 'Joko',
                'email' => 'Jokoterdepan@gmail.com',
                'password' => bcrypt('Jokoterdepan@gmail.com'),
                'status' => StatusType::ACTIVE,
                'role' => RoleType::EMPLOYEE,
                'created_date' => now(),
            ],
            [
                'name' => 'Mariyam',
                'email' => 'Maiyamyuk@gmail.com',
                'password' => bcrypt('Maiyamyuk@gmail.com'),
                'status' => StatusType::ACTIVE,
                'role' => RoleType::EMPLOYEE,
                'created_date' => now(),
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin@gmail.com'),
                'status' => StatusType::ACTIVE,
                'role' => RoleType::ADMIN,
                'created_date' => now(),
            ],
        ]);        
    }
}
