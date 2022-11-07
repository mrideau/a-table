<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Execution du seeder
     */
    public function run()
    {
        $this->call([
            UserSeeder::class
        ]);

        $categories = Category::factory(50)->create();
        $recipes = Recipe::factory(500)->create();

        foreach ($recipes as $recipe) {
            $category = $categories->random();
            $recipe->categories()->attach($category->id);
            $recipe->save();
        }
    }
}
