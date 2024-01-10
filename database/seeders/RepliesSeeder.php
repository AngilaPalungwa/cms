<?php

namespace Database\Seeders;

use App\Models\Replies;
use Illuminate\Database\Seeder;

class RepliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Replies::factory(5)->create();
    }
}
