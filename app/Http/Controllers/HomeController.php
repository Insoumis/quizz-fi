<?php

namespace Melenquizz\Http\Controllers;

use Illuminate\Http\Request;
use Melenquizz\Question;
use Melenquizz\Quizz;
use Melenquizz\QuizzQuestion;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalQuestions = Question::count();
        $totalQuizz = Quizz::count();
        $totalQuizzAnswered = Quizz::where('completed', true)->count();
        $totalAnswer = QuizzQuestion::whereNotNull('answer')->count();

        return view('home', compact('totalQuestions', 'totalQuizz', 'totalQuizzAnswered', 'totalAnswer'));
    }
}
