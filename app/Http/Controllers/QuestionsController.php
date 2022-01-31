<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questions;
class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Questions::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'question' =>'required',
            'rep1' =>'required',
            'rep2' =>'required',
            'rep3' =>'required',
            'repV' =>'required',
            'time' =>'required'

        ]);
        return Questions::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Questions::find($id);
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
        $question = Questions::find($id);
        $question->update($request->all());
        return $question ;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Questions::destroy($id);
    }


    /**
     * Search the specified resource from storage.
     *
     * @param  str  $question
     * @return \Illuminate\Http\Response
     */
    public function search($question)
    {
        return Questions::where('question', 'like', '%'.$question.'%')->get();
    }
}
