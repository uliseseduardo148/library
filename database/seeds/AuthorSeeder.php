<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            'name' => 'Rosario Castellanos',
        ]);

        DB::table('authors')->insert([
            'name' => 'Efraín Bartolomé',
        ]);

        DB::table('authors')->insert([
            'name' => 'Carl Sagan',
        ]);

        DB::table('authors')->insert([
            'name' => 'Odín Dupeyrón',
        ]);
    }
}
