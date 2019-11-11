<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Poll;

class PollQuestionController extends Controller
{
    public function store(Poll $poll)
    {
        $attributes = request()->validate(['text' => 'required','position' => 'required']);
        $poll->addQuestion($attributes);
        return back();
    }

    public function update(Question $question)
    {
        $question->update(request()->validate([
            'text' => ['required', 'min:5', 'max:32']
        ]));
        return back();
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return back();
    }
}
