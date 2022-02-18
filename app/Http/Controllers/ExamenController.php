<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Examen;
class ExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examen = Examen::all();
        return response()->json([
            'examen' =>$examen

        ]);
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
            'cin' =>'required',
            'duree' =>'required',
            'note' =>'required',
            'date'=>'required',
            'question'=>'required',

        ]);
        return Examen::create($request->all());
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
    public function updateNote(Request $request, $id)
    {
      
        $examen = Examen::find($id);
        $examen->update($request->all());
        return $examen ;


    }


    public function updateQuestion(Request $request, $id)
    {
      
        $examen = Examen::find($id);
        $examen->update($request->all());
        return $examen ;


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
