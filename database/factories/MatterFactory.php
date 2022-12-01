<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

class MatterFactory extends Factory
{
 
    public function definition()
    {
        return [
            'description' => $this->faker->sentence(),
            'name' => $this->faker->word(),
            ];
    }
}
