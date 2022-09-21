<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TreeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type_id' => $this->faker->numberBetween(1, 3),
            // code example BB2022AT1
            'code' => strtoupper($this->faker->randomLetter() . $this->faker->randomLetter() . $this->faker->year() . $this->faker->randomLetter() . $this->faker->randomLetter() . $this->faker->numberBetween(1, 3)),
            //planting_date is eleven years ago
            'planting_date' => date('Y-m-d', strtotime('-11 years')),
            'image' => $this->faker->imageUrl(640, 480, 'nature', true) . '|' . $this->faker->imageUrl(640, 480, 'nature', true) . '|' . $this->faker->imageUrl(640, 480, 'nature', true),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
        ];
    }
}
