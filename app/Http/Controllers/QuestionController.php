<?php

namespace Melenquizz\Http\Controllers;

use Illuminate\Http\Request;
use Melenquizz\Category;
use Melenquizz\Http\Requests\AddQuestionRequest;
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
            $request->get('name')
        );

        $question->save();

        return redirect()->route('questions.index')->with('questions.success', 'Question ajoutée !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
