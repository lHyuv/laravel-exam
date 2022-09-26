<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Carbon\Carbon;
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->text,
            'category' => $this->faker->text,
            'description' => $this->faker->text,
            'created_at' => Carbon::now(),
        ];
    }
}
