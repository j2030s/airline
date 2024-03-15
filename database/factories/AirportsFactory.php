<?php

namespace Database\Factories;

use App\Models\Airports;
use Illuminate\Database\Eloquent\Factories\Factory;

class AirportsFactory extends Factory
{
    protected $model = Airports::class;

    public function definition()
    {
        return [
            'code' => $this->faker->unique()->regexify('[A-Z]{3}'),
            'name' => $this->faker->unique()->city . ' Airport',
        ];
    }
}

