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
    public function index() //for examen build
    {   $questions = Questions::all()->slice(0,5); // slice 5 for test after change to random 20
        return response()->json([
            'questions' => $questions->map(function($item, $key) {
                $rep = $item->getReponces;
                return $item->toArray();
            }),
            "time" => $questions->pluck('time')->sum()
        ]);
    }
    public function show($id)
    {   
        $qes = Questions::find($id);
        $questions = Questions::find($id)->getReponces;
       
        return response()->json([
            
            'questions' => $qes,
            // 'niveau' => $qes->niveau,
            // 'time' => $qes->time,
            // 'type' => $qes->type,
            'reponce' => $questions->map(function($item, $key) {
                $rep = $item->getReponces;
                return $item->toArray();
            }) 
            
        ]);

    }


    public function allquestion() // for dashboard admin 
    {  
        $req = Questions::all();
        return response()->json([
            'questions' => $req,

        ]);
    }

    public function sum(){
        $req = Questions::all();
        $req = $req->pluck('time');
        return $req->sum();
       /* return response()->json([
            'Full time' => $req,
            'Nombre de question' =>count($req),
        ]);*/

    }
    public function random(){
        $req = Questions::all();
        $req = $req->random(2);
       
        $sum = $req->pluck('time');
        return response()->json([ 
            'question' => $req,
            
            'full Time' => $sum->sum(),
            
        ]);
    }
    //return Questions::find(1)->getReponces;
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
            'niveau' =>'required',
            'time' =>'required',
            'type' =>'required'

        ]);
        return Questions::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

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
    public function updateTimeStatut(Request $request, $id)
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
