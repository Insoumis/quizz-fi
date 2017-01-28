<?php

namespace Melenquizz\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Melenquizz\Question;
use Melenquizz\QuizzQuestion;

class TopController extends Controller
{
    public function index()
    {
        /** @var Collection $resultByQuestion */
        $resultByQuestion = QuizzQuestion::groupBy('question_id')
            ->selectRaw('sum(`answer`) as sum, count(`id`) as total, `question_id`')
            ->whereHas('quizz', function ($query) {
                $query->where('completed', true);
            })
            ->get()
            ->mapWithKeys(function (QuizzQuestion $question) {
                return [$question->question_id => $question->sum / $question->total];
            })
            ->sort()
            ->reverse();


        $questions = Question::with('category')->get();

        return view('top', compact('resultByQuestion', 'questions'));
    }
}
