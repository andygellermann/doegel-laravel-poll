<?php

namespace App\Http\Controllers;

use App\Poll;
use App\Votes;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{

    public function index()
    {
        $polls = Poll::all();
        return view('umfrage.index', compact('polls'));
    }
    public function direktindex()
    {
        $polls = Poll::all();
        return view('umfrage.alle', compact('polls'));
    }

    public function show(Poll $poll)
    {
        $poll->showQuestions = (strtotime($poll->deadline) > time()) ? 1:0;
        $poll->voteSum = Question::where('poll_id',$poll->id)->sum('votes');
        $poll->quotient = 100 / $poll->voteSum;
        foreach($poll->question as $question){
            $question->percentage = $poll->quotient * $question->votes;
            $question->voteText = ($question->votes == 1) ? ' Stimme': ' Stimmen';
            $question->voteDisplay = ( $question->votes > 0 ) ? '(' . $question->votes . $question->voteText . ')':'';
            $question->percentDisplay = ( $question->votes > 0 ) ? $question->percentage . '%':'';
        }
        return view('umfrage.show', compact('poll'));
    }

    public function update(Request $request)
    {
        $Question = new Question();
        $Question->vote($request);
        return back();
    }
    public function fiprcheck(Request $request)
    {
        $votes = new Votes();
        $result = $votes->check($request->poll,$request->fipr);
        return (!$result) ? 0:$result->id;
    }

}
