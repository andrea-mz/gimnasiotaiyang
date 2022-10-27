<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Activitie;
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
            'act_id'=>Activitie::query()->inRandomOrder()->first()->getKey(),
            'user_id'=>User::query()->where('id','<>','1')->inRandomOrder()->first()->getKey(),
            'date' =>$this->faker->dateTimeThisYear('+1 month')->format('Y-m-d'),
        ];
    }
}
