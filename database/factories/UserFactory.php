<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;


/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'last_name' => $this->faker->lastName(),
            'email_verified_at' => now(),
            'password' => 'password', // password
            'remember_token' => 'qweqweqeqadweq',
        ];
    }
}

