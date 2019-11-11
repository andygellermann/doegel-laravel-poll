<?php

namespace App\Http\Controllers;

use App\Events\PollCreated;
use App\Poll;
use Illuminate\Http\Request;

class PollController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $polls = Poll::where('owner_id', auth()->id())->get();
        return view('polls.index', compact('polls'));
    }
    public function create()
    {
        return view('polls.create');
    }

    public function store(Request $request)
    {
        $attributes = $this->validatePoll();
        $attributes['owner_id'] = auth()->id();
        $attributes['deadline'] = date('Y-m-d H:i:s',strtotime($request['deadline']));
        $poll = Poll::create($attributes);
        return redirect('/polls');
    }

    public function show(Poll $poll)
    {
        /*
         * auth-check method called below you find in Policies/ProjectPolicy.php
         * Create Policy by using model-Template?
         * php artisan make:policy ProjectPolice --model=Project
         * --model= create a Policy for a Model by "Boilerplate"
         * */
        return view('polls.show', compact('poll'));
    }

    public function edit(Poll $poll)
    {
//        $this->authorize('update', $project);
        return view('polls.edit', compact('poll'));
    }

    public function update(Poll $poll)
    {
        $attributes = $this->validatePoll($poll);
        $attributes['deadline'] = date('Y-m-d H:i:s',strtotime($attributes['deadline']));
        //dd($attributes);
        $poll->update($attributes);
        return redirect('/polls');
    }

    public function destroy(Poll $poll)
    {
//        $this->authorize('update', $project);
        $poll->delete();
        return redirect('/polls');
    }

    public function validatePoll()
    {
        return request()->validate([
            'title' => ['required', 'min:5', 'max:64'],
            'description' => ['required','min:10'],
            'deadline' => ['required','min:10', 'max:10']
        ]);
    }
}
