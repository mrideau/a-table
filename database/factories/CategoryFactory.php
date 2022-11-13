<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Definition des status du modèle
     */
    public function definition()
    {
        $name = $this->faker->lastName();
        return [
            'name' => $name,
            'slug' => Str::slug($name)
        ];
    }
}
