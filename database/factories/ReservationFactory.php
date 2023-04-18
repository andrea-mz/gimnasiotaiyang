<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Hour;
use \App\Models\User;

class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>User::query()->where('id','<>','1')->inRandomOrder()->first()->getKey(),
            'hour_id'=>Hour::query()->inRandomOrder()->first()->getKey(),
        ];
    }
}
