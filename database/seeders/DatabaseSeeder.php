<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Airports;
use App\Models\Flights;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Seed users
        User::factory()->count(50)->create();

        // Seed airports
        Airports::factory()->count(20)->create();

        // Seed flights
        Flights::factory()->count(50)->create();
    }
}
