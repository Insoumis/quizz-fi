<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        $categories = [
            1 => "La 6e république",
            2 => "Protéger et partager",
            3 => "La plannification écologique",
            4 => "Sortir des traités européens",
            5 => "Pour l'indépence de la france",
            6 => "Le progrès humain d'abord",
            7 => "La france aux frontières de l'humanité",
        ];

        foreach ($categories as $id => $category) {
            \Melenquizz\Category::forceCreate([
                'id' => $id,
                'name' => $category,
                'slug' => str_slug($category),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
