<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'description' => $this->faker->sentences(rand(2,5), true),
            'price' => $this->faker->numberBetween(200,500),
            'user_id' => User::all()->random(),
            'client_id' => Client::all()->random(),
        ];
    }
}
