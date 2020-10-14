<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Novela',
            'description' => 'Categoría novelas',
        ]);

        DB::table('categories')->insert([
            'name' => 'Poesía',
            'description' => 'Categoría poesías',
        ]);

        DB::table('categories')->insert([
            'name' => 'Ficción',
            'description' => 'Categoría ficción',
        ]);
    }
}
