<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Usuario1',
            'email' => 'user@test.com',
            'password' => 'user',
        ]);

        DB::table('users')->insert([
            'name' => 'Usuario2',
            'email' => 'user2@test.com',
            'password' => 'user',
        ]);

        DB::table('users')->insert([
            'name' => 'Usuario3',
            'email' => 'user3@test.com',
            'password' => 'user',
        ]);
    }
}
