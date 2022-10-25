<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call([
//            CategorySeeder::class,
//            RecipeSeeder::class
//        ]);

        DB::table('users')->insert([
            'name' => 'Matis',
            'email' => 'matis.rideau@hotmail.com',
            'password' => Hash::make('testpswd'),
        ]);

        $categories = Category::factory(5)->create();
        $recipes = Recipe::factory(5)->create();

        foreach ($recipes as $recipe) {
            $category = $categories->random();
            $recipe->categories()->attach($category->id);
            $recipe->save();
        }

        // \App\Models\User::factory(10)->create();

    }
}
