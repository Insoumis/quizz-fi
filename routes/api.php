<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/quizz', function (Request $request) {
    return \Melenquizz\Quizz::with('questions', 'questions.question', 'questions.category')
        ->where('uniqid', $request->get('id'))
        ->firstOrFail();
});
