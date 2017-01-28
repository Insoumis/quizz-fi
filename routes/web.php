<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'IndexController@index')->name('index');
Route::post('/quizz', 'QuizzController@generate')->name('generate_quizz');
Route::get('/quizz/{unqid}', 'QuizzController@gameOn')->name('quizz');


// Authentication Routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login')->middleware('guest');
Route::post('login', 'Auth\LoginController@login')->middleware('guest');
Route::post('logout', 'Auth\LoginController@logout')->middleware('auth')->name('logout');

Route::group(['prefix' => 'some-secret-zone', 'middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('questions', 'QuestionController@index')->name('questions.index');
    Route::get('questions/create', 'QuestionController@create')->name('questions.create');
    Route::post('questions', 'QuestionController@store')->name('questions.store');
    Route::get('questions/{question}', 'QuestionController@edit')->name('questions.edit');
    Route::put('questions/{question}', 'QuestionController@update')->name('questions.update');
    Route::delete('questions/{question}', 'QuestionController@destroy')->name('questions.destroy');
});
