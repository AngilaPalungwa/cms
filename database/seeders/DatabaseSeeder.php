<?php

namespace Database\Seeders;

use App\Models\Roles;
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
//        $this->call(UserTableSeeder::class);
         \App\Models\User::factory(500)->create();
         Roles::factory(500)->create();
    }
}
