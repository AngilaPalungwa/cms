<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comments;
use App\Models\Replies;
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
         Category::factory(100)->create();

    }
}
