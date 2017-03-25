<?php

namespace Melenquizz\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Melenquizz\Question;
use Melenquizz\QuizzQuestion;
use stdClass;

class TopController extends Controller
{
    public function index()
    {
        $questions = Question::with('category')->get();

        /** @var Collection $resultByQuestion */
        $resultByQuestionQuery = QuizzQuestion::groupBy('question_id')
            ->selectRaw('sum(`answer`) as sum, count(`id`) as total, `question_id`')
            ->whereHas('quizz', function ($query) {
                $query->where('completed', true);
            })
            ->get();

        $resultByQuestion = $resultByQuestionQuery->mapWithKeys(function (QuizzQuestion $question) {
            $resultSet = new stdClass;
            $resultSet->pct = $question->sum / $question->total;
            $resultSet->total = $question->total;
            return [$question->question_id => $resultSet];
        })
            ->sort(function ($a, $b) {
                if ($a->pct == $b->pct) {
                    return $a->total <=> $b->total;
                }
                return $a->pct <=> $b->pct;
            })
            ->reverse();



        return view('top', compact('resultByQuestion', 'questions'));
    }
}
