<?php

namespace App\Http\Controllers;

use App\Task;
use http\Env\Request;

class PageController extends Controller
{
    public function home(){
        //
    }
    public function contact(){
        return view('contact');
    }

    public function about(){
        return view('about');
    }

}
