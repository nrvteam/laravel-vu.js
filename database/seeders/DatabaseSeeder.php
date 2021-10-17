<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Movie;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Movie::factory(17)->create();
    }
}
