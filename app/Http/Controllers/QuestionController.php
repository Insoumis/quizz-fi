<?php

namespace Melenquizz\Http\Controllers;

use Illuminate\Http\Request;
use Melenquizz\Category;
use Melenquizz\Http\Requests\AddQuestionRequest;
use Melenquizz\Http\Requests\EditQuestionRequest;
use Melenquizz\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::with('category')->orderBy('category_id', 'asc')->orderBy('created_at', 'desc')->get();
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('questions.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AddQuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddQuestionRequest $request)
    {
        $question = Question::add(
            $request->get('category_id'),
            $request->get('proposition'),
            $request->get('description'),
            $request->get('page_no')
        );

        $question->save();

        return redirect()->route('questions.index')->with('questions.success', 'Question ajoutée !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Question $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $categories = Category::all();
        return view('questions.edit', compact('question', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditQuestionRequest $request
     * @param Question $question
     * @return \Illuminate\Http\Response
     */
    public function update(EditQuestionRequest $request, Question $question)
    {
        $question->edit(
            $request->get('category_id'),
            $request->get('proposition'),
            $request->get('description'),
            $request->get('page_no')
        );
        $question->save();

        return redirect()->route('questions.index')->with('questions.success', 'Question modifiée !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
