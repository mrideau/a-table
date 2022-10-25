<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
//    CREATE TABLE categories (
//        id BIGINT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
//        name CHAR(255),
//        slug CHAR(255),
//        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//    );

//    CREATE TABLE category_recipe (
//        recipe_id BIGINT UNSIGNED NOT NULL,
//        category_id BIGINT UNSIGNED NOT NULL,
//
//        FOREIGN KEY (recipe_id) REFERENCES recipes(id),
//        FOREIGN KEY (category_id) REFERENCES categories(id)
//    );

    /**
     * Lancer la migration.
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create('category_recipe', function (Blueprint $table) {
            $table->foreignId('recipe_id')->constrained('recipes');
            $table->foreignId('category_id')->constrained('categories');
        });
    }

    /**
     * Inversion de la migration.
     */
    public function down()
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('category_recipe');
    }
}
