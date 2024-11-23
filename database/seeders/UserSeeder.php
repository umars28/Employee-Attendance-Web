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
                'password' => bcrypt('password123'),
                'status' => StatusType::INACTIVE,
                'role' => RoleType::EMPLOYEE,
                'created_date' => now(),
            ],
            [
                'name' => 'Khariz',
                'email' => 'Kharizajaah@gmail.com',
                'password' => bcrypt('password123'),
                'status' => StatusType::ACTIVE,
                'role' => RoleType::EMPLOYEE,
                'created_date' => now(),
            ],
            [
                'name' => 'Joko',
                'email' => 'Jokoterdepan@gmail.com',
                'password' => bcrypt('password123'),
                'status' => StatusType::ACTIVE,
                'role' => RoleType::EMPLOYEE,
                'created_date' => now(),
            ],
            [
                'name' => 'Mariyam',
                'email' => 'Maiyamyuk@gmail.com',
                'password' => bcrypt('password123'),
                'status' => StatusType::ACTIVE,
                'role' => RoleType::EMPLOYEE,
                'created_date' => now(),
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password123'),
                'status' => StatusType::ACTIVE,
                'role' => RoleType::ADMIN,
                'created_date' => now(),
            ],
        ]);        
    }
}
