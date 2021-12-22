<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nm_supplier' => $this->faker->name(),
            'alamat' => $this->faker->address,
            'telp' => $this->faker->phoneNumber(),
            'fax_supplier' => $this->faker->phoneNumber(),
            'note' => $this->faker->paragraph(mt_rand(10, 100))
        ];
    }
}
