<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KabarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kategori_barang' => $this->faker->word(mt_rand(10, 50))
        ];
    }
}
