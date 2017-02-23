<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugToCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('slug');
        });

        $categories = [
            1 => 'sixieme-republique',
            2 => 'proteger-et-partager',
            3 => 'la-plannification-ecologique',
            4 => 'sortir-des-traites-europeens',
            5 => 'pour-l-indepence-de-la-france',
            6 => 'le-progres-humain-d-abord',
            7 => 'la-france-aux-frontieres-de-l-humanite',
        ];

        foreach ($categories as $id => $slug) {
            \Melenquizz\Category::where('id', $id)->update([
                'slug' => $slug
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
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}
