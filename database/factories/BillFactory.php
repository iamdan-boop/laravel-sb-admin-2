<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class BillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'consumption' => $this->faker->numberBetween(30, 1000),
            'billing_amount' => rand(100, 1000),
            'status' => $this->faker->numberBetween(0, 1),
            'client_id' => Client::all()->random()->id,
        ]; 
    }
}
