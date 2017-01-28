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
            $table->string('color');
            $table->timestamps();
        });

        $categories = [
            1 => ['name' => "La 6e république", 'color' => '#000'],
            2 => ['name' => "Protéger et partager", 'color' => '#000'],
            3 => ['name' => "La plannification écologique", 'color' => '#000'],
            4 => ['name' => "Sortir des traités européens", 'color' => '#000'],
            5 => ['name' => "Pour l'indépence de la france", 'color' => '#000'],
            6 => ['name' => "Le progrès humain d'abord", 'color' => '#000'],
            7 => ['name' => "La france aux frontières de l'humanité", 'color' => '#000'],
        ];

        foreach ($categories as $id => $category) {
            \Melenquizz\Category::forceCreate([
                'id' => $id,
                'name' => $category['name'],
                'color' => $category['color'],
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
