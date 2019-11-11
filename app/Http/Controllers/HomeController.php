<?php

namespace App\Http\Controllers;

use App\Poll;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $polls = Poll::all();
        return view('umfrage.index', compact('polls'));
    }
    public function show(Poll $poll)
    {
        //dd($poll);
        $polls = Poll::where('id', $poll)->get();
        return view('umfrage.show', compact('polls'));
    }
}
