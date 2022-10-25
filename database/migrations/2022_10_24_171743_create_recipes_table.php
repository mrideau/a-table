<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
//    CREATE TABLE recipes (
//        id BIGINT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
//        name CHAR(255),
//        slug CHAR(255),
//        description TEXT,
//        image_path CHAR(255),
//        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//    );

    /**
     * Lancer la migration.
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('slug');
            $table->string('image_path');
            $table->timestamps();
        });
    }

    /**
     * Inversion de la migration.
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
