<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RecipeFactory extends Factory
{
    /**
     * Definition des status du modèle
     */
    public function definition()
    {
        $name = $this->faker->firstName();
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'image_path' => 'placeholder.jpg',
            'description' => $this->faker->paragraph(15),
        ];
    }
}
