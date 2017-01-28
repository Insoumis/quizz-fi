<?php

namespace Melenquizz\Http\Controllers;

use Melenquizz\QuizzGenerator;
use Illuminate\Http\Request;

class QuizzController extends Controller
{
    public function generate(Request $request, QuizzGenerator $quizzGenerator)
    {
        $quizz = $quizzGenerator->generate($request->get('type'));

        return redirect()->route('quizz', $quizz->uniqid);
    }

    public function gameOn($uniqId)
    {
        return view('quizz', ['quizz_id' => $uniqId]);
    }
}
