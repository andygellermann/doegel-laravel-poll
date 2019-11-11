<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$question = Question::all();
        $question = Question::all()->sortByDesc("position");;
        return view('question.index', compact('question'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('polls.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Question::create($this->validateQuestion());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('polls.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('question.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Question $question)
    {
        $question->update(request()->validate([
            'text' => ['required', 'min:1', 'max:64']
        ]));
        //return redirect('/tasks');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        //return redirect('/tasks');
        return back();
    }

    public function validateQuestion(){
        return request()->validate([
            'text' => ['required', 'min:5', 'max:64'],
            'poll_id' => ['required'],
            'position' => ['required','numeric']
        ]);
    }
    public function updatePositions(Request $request){
        $update_sequence = json_decode($request->getContent(false), true);
        foreach($update_sequence as $row){
            $Question = new Question();
            $Question->updatePosition($row['id'],$row['position']);
        }
        $response = array(
            'status' => 'success',
            'success' => 'Sortierung erfolgreich gespeichert!',
            'result' => $update_sequence,
        );
        return \Response::json($response);
    }
}
