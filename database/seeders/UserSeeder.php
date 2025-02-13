<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'user_name' => 'root',
                'email' => 'root@gmail.com',
                'password' => bcrypt('12345678')
            ],
            [
                'user_name' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('12345678')
            ]
        ]);
    }
}
