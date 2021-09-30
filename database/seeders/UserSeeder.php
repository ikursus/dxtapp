<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1 Menggunakan Query Builder
        DB::table('users')->insert([
            'name' => 'Ahmad',
            'username' => 'admin',
            'email' => 'ahmad@gmail.com',
            'password' => Hash::make('pass'), // bcrypt('pass')
            'status' => 'active'
        ]);

        DB::table('users')->insert([
            'name' => 'Ali',
            'username' => 'ali',
            'email' => 'ali@gmail.com',
            'password' => Hash::make('pass'), // bcrypt('pass')
            'status' => 'active'
        ]);

        DB::table('users')->insert([
            'name' => 'Siti',
            'username' => 'siti',
            'email' => 'siti@gmail.com',
            'password' => Hash::make('pass'), // bcrypt('pass')
        ]);
        // 2 Menggunakan Model
    }
}
