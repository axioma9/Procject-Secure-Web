<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\rangkitpc\Product;
use App\Models\User;

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
        User::factory(5)->create();
        Product::factory(20)->create();
    }
}
