<?php

namespace Melenquizz\Http\Controllers;

use Illuminate\Http\Request;
use Melenquizz\Category;
use Melenquizz\Quizz;
use Melenquizz\QuizzGenerator;
use Melenquizz\QuizzQuestion;

class QuizzController extends Controller
{
    public function generate(Request $request, QuizzGenerator $quizzGenerator)
    {
        $quizz = $quizzGenerator->generate($request->get('type'));

        return redirect()->route('quizz', $quizz->uniqid);
    }

    public function gameOn($uniqId)
    {
        if (Quizz::where('completed', true)->where('uniqid', $uniqId)->exists()) {
            return redirect()->route('quizz.result', $uniqId);
        }

        return view('quizz.show', ['quizz_id' => $uniqId]);
    }

    public function result($uniqId)
    {
        $quizz = Quizz::with('questions')->where('completed', true)->where('uniqid', $uniqId)->firstOrFail();
        $categories = Category::all();

        $avgGlobal = $quizz->questions->avg(function (QuizzQuestion $question) {
            return $question->answer;
        });

        $avgByCategories = $quizz->questions
            ->groupBy('category_id')
            ->map(function ($questions) {
                return $questions->avg(function (QuizzQuestion $question) {
                    return $question->answer;
                });
            });


        return view('quizz.result', compact('quizz', 'avgGlobal', 'avgByCategories', 'categories'));
    }
}
