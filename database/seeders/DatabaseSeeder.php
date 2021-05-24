<?php

namespace Database\Seeders;

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
        $this->call(UserSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(PriceSeeder::class);
        $this->call(CategorySeeder::class);
        \App\Models\User::factory(10)->create();

    }
}
