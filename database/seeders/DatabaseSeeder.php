<?php

namespace Database\Seeders;

use App\Models\Sabar;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Supplier::factory(10000)->create();
        Sabar::factory(2)->create();
    }
}
