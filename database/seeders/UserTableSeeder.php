<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' =>'Admin',
            'email' =>'admin@admin.com',
            'password' => bcrypt('123456'),
            'username' =>'admin',
            'status' => 'active'
        ];

        DB::table('users')->insert($data);
    }
}
