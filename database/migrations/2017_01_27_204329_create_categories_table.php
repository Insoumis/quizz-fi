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

        $categories = ["La 6e république",
            "Protéger et partager",
            "La plannification écologique",
            "Sortir des traités européens",
            "Pour l'indépence de la france",
            "Le progrès humain d'abord",
            "La france aux frontières de l'humanité",
        ];

        foreach ($categories as $category) {
            \Melenquizz\Category::forceCreate([
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
