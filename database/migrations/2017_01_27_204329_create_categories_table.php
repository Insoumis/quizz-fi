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
            2 => ['name' => "Protéger et partager", 'color' => '#F00'],
            3 => ['name' => "La plannification écologique", 'color' => '#0F0'],
            4 => ['name' => "Sortir des traités européens", 'color' => '#00F'],
            5 => ['name' => "Pour l'indépence de la france", 'color' => '#FF0'],
            6 => ['name' => "Le progrès humain d'abord", 'color' => '#0FF'],
            7 => ['name' => "La france aux frontières de l'humanité", 'color' => '#F0F'],
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
