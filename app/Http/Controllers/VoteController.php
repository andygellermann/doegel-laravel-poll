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
        $polls = Poll::orderBy('created_at','desc')->take(5)->get();;
        return view('umfrage.index', compact('polls'));
    }
    public function direktindex()
    {
        $polls = Poll::all();
        return view('umfrage.alle', compact('polls'));
    }

    public function show(Poll $poll)
    {
        $poll->listQuestions = ($this->listcheck($poll->id,$poll->cookie()))?0:1; // find existing votes in voting-table = 0 else 1
        $poll->showQuestions = (strtotime($poll->deadline) > time()) ? 1:0;
        $poll->voteSum = Question::where('poll_id',$poll->id)->sum('votes');
        $poll->quotient = ($poll->voteSum > 0) ? 100 / $poll->voteSum:0;
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
    public function listcheck($poll_id,$poll_cookie)
    {
        $votes = new Votes();
        $result = $votes->check($poll_id,$poll_cookie);
        return (!$result) ? 0:$result->id;
    }

}
