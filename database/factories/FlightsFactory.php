<?php

namespace Database\Factories;

use App\Models\Flights;
use Illuminate\Database\Eloquent\Factories\Factory;

class FlightsFactory extends Factory
{
    protected $model = Flights::class;

    public function definition()
    {
        return [
            'flight_number' => $this->faker->unique()->randomNumber(5),
            'departure_airport_id' => \App\Models\Airports::factory(),
            'arrival_airport_id' => \App\Models\Airports::factory(),
            'departure_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'class' => $this->faker->randomElement(['economy', 'business', 'first']),
            'price' => $this->faker->randomFloat(2, 100, 1000),
        ];
    }
}

