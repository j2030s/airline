<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Admin user with the 'admin' role
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin1@example.com',
            'password' => Hash::make('12345678'),
            'role_id' => 1, // 'admin' role
        ]);

        // Additional user records with the 'user' role
        DB::table('users')->insert([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('12345678'),
            'role_id' => 2, // 'user' role
        ]);

        
    }
}
