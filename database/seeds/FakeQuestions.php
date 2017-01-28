<?php

use Illuminate\Database\Seeder;

class FakeQuestions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 7; $i++) {
            for ($j = 1; $j <= 7; $j++) {
                \Melenquizz\Question::forceCreate([
                    "proposition" => "Proposition " . $i . "-" . $j,
                    "description" => "description " . $i . "-" . $j,
                    "page_no" => rand(1, 150),
                    "category_id" => $i,
                ]);
            }
        }
    }
}
