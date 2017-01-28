<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizzQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizz_questions', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('quizz_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('question_id');
            $table->unsignedSmallInteger('answer')->nullable(); // 0 - 25 - 50 - 75 - 100

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizz_questions');
    }
}
