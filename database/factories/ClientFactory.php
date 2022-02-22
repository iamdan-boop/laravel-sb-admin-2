<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'middle_initial' => 'A',
            'last_name' => $this->faker->lastName(),
            'meter_number' => $this->faker->numberBetween(1, 100),
            'stub_number' => $this->faker->numberBetween(1, 100),
        ];
    }
}
