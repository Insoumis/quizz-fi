<?php
namespace Melenquizz;

class QuizzGenerator
{
    /**
     * @param $type
     *
     * @return Quizz
     */
    public function generate($type)
    {
        $repartions = config('melenquizz.repartition');
        if (!array_key_exists($type, $repartions)) {
            throw new \RuntimeException();
        }

        $questions = $this->getQuestions($type, $repartions);

        $quizz = new Quizz;
        while (!$quizz->exists) {
            $quizz->uniqid = str_random(8);
            $quizz->save();
        }
        foreach ($questions as $question) {
            $quizzQuestion = new QuizzQuestion;
            $quizzQuestion->quizz_id = $quizz->id;
            $quizzQuestion->category_id = $question->category_id;
            $quizzQuestion->question_id = $question->id;
            $quizzQuestion->save();
        }

        return $quizz;
    }

    /**
     * @param $type
     * @param $repartions
     * @return \Illuminate\Support\Collection|static
     */
    private function getQuestions($type, $repartions)
    {
        $categories = Category::with('questions')->get();
        $questions = collect();
        foreach ($repartions[$type] as $categoryId => $nbQuestions) {
            $questions = $questions->merge($categories->find($categoryId)->questions->random($nbQuestions));
        }
        return $questions;
    }
}
