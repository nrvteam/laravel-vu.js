<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use \App\Models\Movie;
use \App\Models\User;
use Illuminate\Support\Facades\DB;

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
        DB::table('roles')->insert(['name' => "admin"]);
        DB::table('roles')->insert(['name' => "default"]);
        User::factory()->create(["email" => 'admin@email.com'])->role()->attach(1);
        User::factory()->create(["email" => 'user@email.com'])->role()->attach(2);
    }
}
