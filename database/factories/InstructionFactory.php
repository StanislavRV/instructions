<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InstructionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => $this->faker->text(rand(5,15)),
            "description" => $this->faker->text(rand(20,50)),
            "path" =>'111.txt',
            "confirm" => rand(0,1),
            "user_id" => rand(1,5),
            "category_id" => rand(1,5),
        ];
    }
}
