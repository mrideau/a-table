<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    /**
     * Execution du seeder
     */
    public function run()
    {
        DB::table('recipes')->insert([
           'name' => 'Ma Recette'
        ]);
    }
}
