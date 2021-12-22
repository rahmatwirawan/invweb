<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SabarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_satuan' => $this->faker->word(mt_rand(3, 9))
        ];
    }
}
